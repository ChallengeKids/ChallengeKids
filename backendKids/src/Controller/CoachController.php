<?php

namespace App\Controller;

use App\Entity\Coach;
use App\Form\CoachType;
use App\Form\UserPasswordType;
use App\Repository\CoachRepository;
use App\Service\CoachService;
use Doctrine\ORM\EntityManagerInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
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
    private $entityManager;
    public function __construct(UserPasswordHasherInterface $passwordHasher, CoachService $coachService, EntityManagerInterface $entityManager)
    {
        $this->passwordHasher = $passwordHasher;
        $this->coachService = $coachService;
        $this->entityManager = $entityManager;
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

    #[Route('/register', name: 'coach_register', methods: ['POST'])]
    #[OA\RequestBody(content: new Model(type: CoachType::class))]
    #[OA\Response(
        response: 200,
        description: 'User successfully registered',
        content: new OA\JsonContent(
            type: 'object',
            properties: [
                new OA\Property(property: 'message', type: 'string')
            ]
        )
    )]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): JsonResponse
    {

        $data = json_decode($request->getContent(), true);

        if ($data === null) {
            return new JsonResponse(['message' => 'Invalid JSON data']);
        }

        $user = new Coach();

        $user->setFullName($data['fullName']);
        $user->setEmail($data['email']);
        if ($data['plainPassword'] != $data['confirmPassword']) {
            return new JsonResponse(['message' => 'Passwords dont match']);
        }

        $user->setPassword(
            $userPasswordHasher->hashPassword(
                $user,
                $data['plainPassword']
            )
        );

        $user->setRegistrationDate(new \DateTime());

        $entityManager->persist($user);
        $entityManager->flush();
        return new JsonResponse(true);

        return new JsonResponse(false);
    }

    #[Route('/{id}/edit', name: 'coach_edit', methods: ['PUT'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: Object::class,
            example: [
                "fullName" => "Coach11",
                "email" => "Coach11@gmail.com",
                "password" => "12345",
            ]
        )
    )]
    public function edit($id, Request $request, CoachRepository $coachRepository, EntityManagerInterface $entityManager): Response
    {
        $coach = $coachRepository->find($id);
        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(CoachType::class, $coach);
        $form->submit($data);

        if ($form->isSubmitted()) {

            $hashedPassword = $this->passwordHasher->hashPassword($coach, $coach->getPassword());
            $coach->setPassword($hashedPassword);
            $coach->setFullName($data["fullName"]);
            $coach->setEmail($data["email"]);
            $this->entityManager->persist($coach);
            $this->entityManager->flush();
            return new JsonResponse(true);
        }

        return new JsonResponse(false);
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

    #[Route('/{id}/addTeachingDomains', name: 'coach_add_teachingDomains', methods: ['POST'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: Object::class,
            example: [
                "categoryTitles" => ["Art", "Science", "Music"],
            ]
        )
    )]
    public function addInterests($id, Request $request): JsonResponse
    {
        $data = $request->toArray();
        $categoryTitles = $data['categoryTitles'];
        $this->coachService->updateCategories($id, $categoryTitles);
        return new JsonResponse(['status' => 'Categories updated successfully']);
    }
}
