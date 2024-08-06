<?php

namespace App\Controller;

use App\Entity\Lesson;
use App\Form\LessonType;
use App\Repository\LessonRepository;
use App\Repository\PostRepository;
use App\Service\LessonService;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

#[Route('/api/lesson')]
#[OA\Tag(name: 'Lesson')]
class LessonController extends AbstractController
{
    private $lessonService;
    private $security;
    private $entityManager;
    public function __construct(LessonService $lessonService, Security $security, EntityManagerInterface $entityManager)
    {
        $this->lessonService = $lessonService;
        $this->security = $security;
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'lesson_index', methods: ['GET'])]
    public function index(LessonRepository $lessonRepository): JsonResponse
    {
        $listJson = [];
        $list = $lessonRepository->findAll();
        foreach ($list as $key => $value) {
            $listJson[$key] = $this->lessonService->lessonToJson($value);
        }
        return new JsonResponse($listJson);
    }

    #[Route('/coach', name: 'lesson_coach', methods: ['GET'])]
    public function getCoachLessons(LessonRepository $lessonRepository): JsonResponse
    {
        $user = $this->security->getUser();

        $listJson = [];
        $list = $lessonRepository->findBy(["coach" => $user]);
        foreach ($list as $key => $value) {
            $listJson[$key] = $this->lessonService->lessonToJson($value);
        }
        return new JsonResponse($listJson);
    }

    #[Route('/new', name: 'lesson_new', methods: ['POST'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: Object::class,
            example: [
                "title" => "1st Lesson",
                "description" => "This is the description of the first lesson",
                "LessonNumber" => 1,
            ]
        )
    )]
    public function new(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $coach = $this->security->getUser();

        $lesson = new Lesson();
        $lesson->setCoach($coach);
        $form = $this->createForm(LessonType::class, $lesson);
        $form->submit($data);

        if ($form->isSubmitted()) {
            $entityManager->persist($lesson);
            $entityManager->flush();
        }

        return new JsonResponse(true);
    }

    #[Route('/{title}', name: 'lesson_show', methods: ['GET'])]
    public function show($title, LessonRepository $lessonRepository): Response
    {
        $lesson = $lessonRepository->findOneBy(['title' => $title]);
        $lesson = $this->lessonService->lessonToJson($lesson);
        return new JsonResponse($lesson);
    }

    #[Route('/{id}/edit', name: 'lesson_edit', methods: ['PUT'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: Object::class,
            example: [
                "title" => "1st Lesson Changed",
                "description" => "This is the changed description of the first lesson",
                "LessonNumber" => 1,
            ]
        )
    )]
    public function edit($id, Request $request, LessonRepository $lessonRepository, EntityManagerInterface $entityManager): Response
    {
        $lesson = $lessonRepository->find($id);

        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(LessonType::class, $lesson);
        $form->submit($data);

        if ($form->isSubmitted()) {
            $entityManager->persist($lesson);
            $entityManager->flush();

            return new JsonResponse(['status' => 'Lesson updated successfully']);
        }

        return new JsonResponse(['error' => 'An error has occured']);
    }

    #[Route('/delete/{id}', name: 'lesson_delete', methods: ['DELETE'])]
    public function delete($id, LessonRepository $lessonRepository, EntityManagerInterface $entityManager): Response
    {
        $lesson = $lessonRepository->find($id);
        if (!$lesson) {
            throw new NotFoundHttpException('Lesson not found');
        }

        $entityManager->remove($lesson);
        $entityManager->flush();

        return new JsonResponse(['status' => 'The Lesson has been deleted']);
    }

    #[Route('/{id}/assignPost', name: 'lesson_assign_post', methods: ['PUT'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: Object::class,
            example: [
                "postId" => 4,
            ]
        )
    )]
    public function addLesson($id, Request $request, PostRepository $postRepository, LessonRepository $lessonRepository): JsonResponse
    {
        $lesson = $lessonRepository->find($id);
        $data = json_decode($request->getContent(), true);
        $post = $postRepository->find($data["postId"]);
        $lesson->setPost($post);
        $this->entityManager->persist($lesson);
        $this->entityManager->flush();
        return new JsonResponse(true);
    }
}
