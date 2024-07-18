<?php

namespace App\Controller;

use App\Entity\Kid;
use App\Entity\KidResponse;
use App\Entity\Quiz;
use App\Form\ResponseType;
use App\Repository\KidResponseRepository;
use App\Service\KidResponseService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/api/kidResponse')]
#[OA\Tag(name: 'KidResponse')]
class KidResponseController extends AbstractController
{
    private $kidResponseService;

    public function __construct(KidResponseService $kidResponseService)
    {
        $this->kidResponseService = $kidResponseService;
    }

    #[Route('/', name: 'response_index', methods: ['GET'])]
    public function index(KidResponseRepository $responseRepository): JsonResponse
    {
        $listJson = [];
        $list = $responseRepository->findAll();
        foreach ($list as $key => $value) {
            $listJson[$key] = $this->kidResponseService->kidResponseToJson($value);
        }
        return new JsonResponse($listJson);
    }

    #[Route('/new', name: 'response_new', methods: ['POST'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: Object::class,
            example: [
                "quiz_id" => 1,
                "kid_id" => 7
            ]
        )
    )]
    public function new(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $quiz = $entityManager->getRepository(Quiz::class)->find($data['quiz_id']);
        if (!$quiz) {
            return $this->json(['error' => 'Lesson not found'], Response::HTTP_NOT_FOUND);
        }

        $kid = $entityManager->getRepository(Kid::class)->find($data['kid_id']);
        if (!$quiz) {
            return $this->json(['error' => 'Lesson not found'], Response::HTTP_NOT_FOUND);
        }

        $kidResponse = new KidResponse();

        $kidResponse->setQuiz($quiz);
        $kidResponse->setKid($kid);
        $entityManager->persist($kidResponse);
        $entityManager->flush();

        return new JsonResponse(true);
    }

    #[Route('/{id}', name: 'response_show', methods: ['GET'])]
    public function show($id, KidResponseRepository $kidResponseRepository): JsonResponse
    {
        $kidResponse = $kidResponseRepository->find($id);
        $kidResponse = $this->kidResponseService->kidResponseToJson($kidResponse);
        return new JsonResponse($kidResponse);
    }
}
