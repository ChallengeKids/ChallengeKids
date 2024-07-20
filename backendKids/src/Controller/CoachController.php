<?php

namespace App\Controller;

use App\Entity\Coach;
use App\Form\CoachType;
use App\Form\UserPasswordType;
use App\Repository\CoachRepository;
use App\Service\CoachService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/api/coach')]
#[OA\Tag(name: 'Coach')]
class CoachController extends AbstractController
{
    private $coachService;
    private $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher, CoachService $coachService)
    {
        $this->passwordHasher = $passwordHasher;
        $this->coachService = $coachService;
    }

    #[Route('/', name: 'coach_index', methods: ['GET'])]
    public function index(CoachRepository $coachRepository): JsonResponse
    {
        $listJson = [];
        $list = $coachRepository->findAll();
        foreach ($list as $key => $value) {
            $listJson[$key] = $this->coachService->coachToJson($value);
        }

        return new JsonResponse($listJson);
    }

    #[Route('/{id}', name: 'coach_show', methods: ['GET'])]
    public function show(CoachRepository $coachRepository, $id): Response
    {
        $coach = $coachRepository->find($id);
        $coach = $this->coachService->coachToJson($coach);
        return new JsonResponse($coach);
    }

    #[Route('/{id}/changePassword', name: 'coach_edit', methods: ['PUT'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: Object::class,
            example: [
                "password" => "securepassword",
            ]
        )
    )]
    public function changePassword($id, Request $request, CoachRepository $coachRepository, EntityManagerInterface $entityManager): Response
    {
        $coach = $coachRepository->find($id);
        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(UserPasswordType::class, $coach);
        $form->submit($data);

        if ($form->isSubmitted()) {

            $hashedPassword = $this->passwordHasher->hashPassword($coach, $coach->getPassword());
            $coach->setPassword($hashedPassword);
            $entityManager->persist($coach);
            $entityManager->flush();
        }

        return new JsonResponse(true);
    }

    #[Route('/delete/{id}', name: 'coach_delete', methods: ['DELETE'])]
    public function delete($id, CoachRepository $coachRepository, EntityManagerInterface $entityManager): JsonResponse
    {
        $coach = $coachRepository->find($id);
        if (!$coach) {
            throw new NotFoundHttpException('Coach not found');
        }

        $entityManager->remove($coach);
        $entityManager->flush();

        return new JsonResponse(['status' => 'The Coach has been deleted']);
    }
}
