<?php

namespace App\Controller;

use App\Entity\KidResponse;
use App\Entity\Lesson;
use App\Entity\Question;
use App\Entity\Quiz;
use App\Form\QuizType;
use App\Repository\QuizRepository;
use App\Service\QuizService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

#[Route('/api/quiz')]
#[OA\Tag(name: 'Quiz')]
class QuizController extends AbstractController
{
    private $quizService;

    public function __construct(QuizService $quizService)
    {
        $this->quizService = $quizService;
    }

    #[Route('/', name: 'app_quiz_index', methods: ['GET'])]
    public function index(QuizRepository $quizRepository): JsonResponse
    {
        $listJson = [];
        $list = $quizRepository->findAll();
        foreach ($list as $key => $value) {
            $listJson[$key] = $this->quizService->quizToJson($value);
        }
        return new JsonResponse($listJson);
    }

    #[Route('/new', name: 'app_quiz_new', methods: ['POST'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: Object::class,
            example: [
                "lesson_id" => 2,
            ]
        )
    )]
    public function new(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['lesson_id'])) {
            return $this->json(['error' => 'Lesson ID is required'], Response::HTTP_BAD_REQUEST);
        }

        $lesson = $entityManager->getRepository(Lesson::class)->find($data['lesson_id']);
        if (!$lesson) {
            return $this->json(['error' => 'Lesson not found'], Response::HTTP_NOT_FOUND);
        }

        $quiz = new Quiz();
        $quiz->setLesson($lesson);
        $entityManager->persist($quiz);
        $entityManager->flush();

        return new JsonResponse(true);
    }

    #[Route('/{id}', name: 'app_quiz_show', methods: ['GET'])]
    public function show($id, QuizRepository $quizRepository): JsonResponse
    {
        $quiz = $quizRepository->find($id);
        $quiz = $this->quizService->quizToJson($quiz);
        return new JsonResponse($quiz);
    }

    #[Route('/{id}', name: 'app_quiz_delete', methods: ['DELETE'])]
    public function delete($id, QuizRepository $quizRepository, EntityManagerInterface $entityManager): JsonResponse
    {
        $quiz = $quizRepository->find($id);
        if (!$quiz) {
            throw new NotFoundHttpException('Quiz not found');
        }

        $entityManager->remove($quiz);
        $entityManager->flush();

        return new JsonResponse(['status' => 'The Quiz has been deleted']);
    }
}
