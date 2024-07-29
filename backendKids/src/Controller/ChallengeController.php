<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Challenge;
use App\Entity\Coach;
use App\Form\ChallengeType;
use App\Repository\ChallengeRepository;
use App\Service\ChallengeService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

#[Route('/api/challenge')]
#[OA\Tag(name: 'challenge')]
class ChallengeController extends AbstractController
{
    private $challengeService;
    private $entityManager;

    public function __construct(ChallengeService $challengeService, EntityManagerInterface $entityManager)
    {
        $this->challengeService = $challengeService;
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'challenge_index', methods: ['GET'])]
    public function index(ChallengeRepository $challengeRepository): JsonResponse
    {
        $listJson = [];
        $list = $challengeRepository->findAll();
        foreach ($list as $key => $value) {
            $listJson[$key] = $this->challengeService->challengeToJson($value);
        }

        return new JsonResponse($listJson);
    }

    #[Route('/new', name: 'challenge_new', methods: ['POST'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: Object::class,
            example: [
                "title" => "Challenge1",
                "description" => "This is a description for the 1st Challenge",
                "categories" => ["Art", "Science", "Music"]
            ]
        )
    )]
    public function new(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $categoryTitles = $data['categories'];
        $challenge = new Challenge();
        $form = $this->createForm(ChallengeType::class, $challenge);
        $form->submit($data);

        if ($form->isSubmitted()) {
            foreach ($categoryTitles as $categoryTitle) {
                $category = $entityManager->getRepository(Category::class)->findOneBy(['title' => $categoryTitle]);
                $challenge->addCategory($category);
            }
            $entityManager->persist($challenge);
            $entityManager->flush();
        }

        return new JsonResponse(true);
    }

    #[Route('/{title}', name: 'challenge_show', methods: ['GET'])]
    public function show(ChallengeRepository $challengeRepository, $title): JsonResponse
    {
        $challenge = $challengeRepository->findOneBy(['title' => $title]);
        $challenge = $this->challengeService->challengeToJson($challenge);
        return new JsonResponse($challenge);
    }

    #[Route('/{id}/edit', name: 'challenge_edit', methods: ['PUT'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: Object::class,
            example: [
                "title" => "Challenge1",
                "description" => "This is a description for the 1st Challenge",
                "categories" => ["Art", "Science", "Music"],
            ]
        )
    )]
    public function edit($id, Request $request, ChallengeRepository $challengeRepository, EntityManagerInterface $entityManager): JsonResponse
    {
        $challenge = $challengeRepository->find($id);

        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(ChallengeType::class, $challenge);
        $form->submit($data);

        if ($form->isSubmitted()) {
            $entityManager->persist($challenge);
            $entityManager->flush();

            return new JsonResponse(['status' => 'Challenge updated successfully']);
        }

        return new JsonResponse(['error' => 'An error has occured']);
    }

    #[Route('/delete/{id}', name: 'challenge_delete', methods: ['DELETE'])]
    public function delete($id, ChallengeRepository $challengeRepository, EntityManagerInterface $entityManager): Response
    {
        $challenge = $challengeRepository->find($id);
        if (!$challenge) {
            throw new NotFoundHttpException('Challenge not found');
        }

        $entityManager->remove($challenge);
        $entityManager->flush();

        return new JsonResponse(['status' => 'The Challenge has been deleted']);
    }
    #[Route('/{coachId}/addImage', name: 'challenge_add_image', methods: ['POST'])]
    #[OA\Post(
        summary: 'Add a new Challenge Image',
        description: 'Add Challenge Image',
        requestBody: new OA\RequestBody(
            description: 'Request body for adding a new Image Challenge',
            required: true,
            content: [
                'multipart/form-data' => new OA\MediaType(
                    mediaType: 'multipart/form-data',
                    schema: new OA\Schema(
                        type: 'object',
                        properties: [
                            new OA\Property(
                                property: 'title',
                                type: 'string',
                                example: 'hadil'
                            ),
                            new OA\Property(
                                property: 'description',
                                type: 'string',
                                example: 'tahki yasser'
                            ),
                            new OA\Property(
                                property: 'imageFileName',
                                type: 'string',
                                format: 'binary',
                                description: 'File to upload'
                            ),
                            new OA\Property(
                                property: 'categories',
                                type: 'array',
                                items: new OA\Items(
                                    type: 'string',
                                    example: 'Category1'
                                ),
                                description: 'List of category titles'
                            )
                        ]
                    )
                )
            ]
        )
    )]
    public function addChallengeImage(Request $request, $coachId): JsonResponse
    {
        $user = $this->entityManager->getRepository(Coach::class)->find($coachId);

        $title = $request->request->get('title');
        $description = $request->request->get('description');
        $imageFile = $request->files->get('imageFileName');
        $categoryTitles = $request->request->get('categories');

        $challenge = new Challenge();

        $challenge->setTitle($title);
        $challenge->setDescription($description);


        if ($imageFile instanceof UploadedFile) {

            $fileName = uniqid() . '.' . $imageFile->guessExtension();

            $uploadsDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads/images';

            $imageFile->move($uploadsDirectory, $fileName);

            $challenge->setImageFileName($fileName);
        } else {

            return new JsonResponse(['message' => 'File upload failed or not recognized.']);
        }

        if ($categoryTitles) {
            $categoryTitlesArray = explode(',', $categoryTitles);

            foreach ($categoryTitlesArray as $categoryTitle) {
                $category = $this->entityManager->getRepository(Category::class)->findOneBy(['title' => trim($categoryTitle)]);
                if ($category) {
                    $challenge->addCategory($category);
                }
            }
        }

        $this->entityManager->persist($challenge);
        $this->entityManager->flush();

        return new JsonResponse(['success' => true, 'message' => 'Image Added successfully.']);
    }
}
