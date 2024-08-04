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
use PHPUnit\Util\Json;
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

    #[Route('/{id}', name: 'coach_show', methods: ['GET'], requirements: ['id' => '\d+'])]
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
    public function edit($id, Request $request, CoachRepository $coachRepository, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $coach = $coachRepository->find($id);
        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(CoachType::class, $coach);
        $form->submit($data);

        if ($form->isSubmitted()) {

            $coach->setPassword(
                $userPasswordHasher->hashPassword(
                    $coach,
                    $data['password']
                )
            );
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
    public function addTeachingDomains($id, Request $request): JsonResponse
    {
        $data = $request->toArray();
        $categoryTitles = $data['categoryTitles'];
        $this->coachService->updateCategories($id, $categoryTitles);
        return new JsonResponse(['status' => 'Categories updated successfully']);
    }

    #[Route('/pending', name: 'api_coaches_pending', methods: ['GET'])]
    public function getPending(CoachRepository $coachRepository): JsonResponse
    {
        $pendingCoaches = $coachRepository->findPendingAcceptance();

        $listJson = [];
        foreach ($pendingCoaches as $key => $coach) {
            $listJson[$key] = $this->coachService->coachToJson($coach);
        }

        return new JsonResponse($listJson);
    }

    #[Route('/accepted', name: 'api_coaches_accepted', methods: ['GET'])]
    public function getAccepted(CoachRepository $coachRepository): JsonResponse
    {
        $acceptedCoaches = $coachRepository->findByAcceptanceStatus(true);

        $listJson = [];
        foreach ($acceptedCoaches as $key => $coach) {
            $listJson[$key] = $this->coachService->coachToJson($coach);
        }

        return new JsonResponse($listJson);
    }

    #[Route('/refused', name: 'api_coaches_refused', methods: ['GET'])]
    public function getRefused(CoachRepository $coachRepository): JsonResponse
    {
        $refusedCoaches = $coachRepository->findByAcceptanceStatus(false);
        $listJson = [];
        foreach ($refusedCoaches as $key => $coach) {
            $listJson[$key] = $this->coachService->coachToJson($coach);
        }

        return new JsonResponse($listJson);
    }

    #[Route('/{id}/status', name: 'api_update_coach_status', methods: ['POST'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: Object::class,
            example: [
                "accepted" => false,
            ]
        )
    )]
    public function updateStatus(int $id, Request $request, CoachRepository $coachRepository, EntityManagerInterface $entityManager): JsonResponse
    {
        $coach = $coachRepository->find($id);
        if (!$coach) {
            return $this->json(['error' => 'Coach not found'], Response::HTTP_NOT_FOUND);
        }

        $data = json_decode($request->getContent(), true);
        $accepted = $data['accepted'] ?? null;

        if ($accepted === null) {
            return $this->json(['error' => 'Invalid status value'], Response::HTTP_BAD_REQUEST);
        }

        $coach->setAccepted($accepted);
        $entityManager->persist($coach);
        $entityManager->flush();

        return new JsonResponse(true);
    }
}
