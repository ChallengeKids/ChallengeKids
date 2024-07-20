<?php

namespace App\Controller;

use App\Entity\Kid;
use App\Form\KidType;
use App\Form\UserPasswordType;
use App\Repository\KidRepository;
use App\Service\KidService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/api/kid')]
#[OA\Tag(name: 'Kid')]
class KidController extends AbstractController
{
    private $kidService;
    private $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher, KidService $kidService)
    {
        $this->passwordHasher = $passwordHasher;
        $this->kidService = $kidService;
    }

    #[Route('/', name: 'kid_index', methods: ['GET'])]
    public function index(KidRepository $kidRepository): JsonResponse
    {
        $listJson = [];
        $list = $kidRepository->findAll();
        foreach ($list as $key => $value) {
            $listJson[$key] = $this->kidService->kidToJson($value);
        }
        return new JsonResponse($listJson);
    }


    #[Route('/{id}', name: 'kid_show', methods: ['GET'])]
    public function show($id, KidRepository $kidRepository): JsonResponse
    {
        $kid = $kidRepository->find($id);
        $kid = $this->kidService->kidToJson($kid);
        return new JsonResponse($kid);
    }

    #[Route('/{id}/changePassword', name: 'kid_edit', methods: ['PUT'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: Object::class,
            example: [
                "password" => "securepassword",
            ]
        )
    )]
    public function changePassword($id, Request $request, KidRepository $kidRepository, EntityManagerInterface $entityManager): Response
    {
        $kid = $kidRepository->find($id);
        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(UserPasswordType::class, $kid);
        $form->submit($data);

        if ($form->isSubmitted()) {

            $hashedPassword = $this->passwordHasher->hashPassword($kid, $kid->getPassword());
            $kid->setPassword($hashedPassword);
            $entityManager->persist($kid);
            $entityManager->flush();
        }

        return new JsonResponse(true);
    }

    #[Route('/delete/{id}', name: 'kid_delete', methods: ['DELETE'])]
    public function delete($id, KidRepository $kidRepository, EntityManagerInterface $entityManager): Response
    {
        $kid = $kidRepository->find($id);
        if (!$kid) {
            throw new NotFoundHttpException('Kid not found');
        }

        $entityManager->remove($kid);
        $entityManager->flush();

        return new JsonResponse(['status' => 'The Kid has been deleted']);
    }
}
