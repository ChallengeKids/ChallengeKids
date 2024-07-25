<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Kid;
use App\Entity\Lesson;
use App\Entity\Post;
use App\Entity\User;
use App\Form\PostType;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use App\Service\PostService;
use App\Service\Reactionservice;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

#[Route('/api/post')]
#[OA\Tag(name: 'Post')]
class PostController extends AbstractController
{
    private $postService;
    private $reactionService;
    private $entityManager;
    public function __construct(PostService $postService, Reactionservice $reactionService, EntityManagerInterface $entityManager)
    {
        $this->postService = $postService;
        $this->reactionService = $reactionService;
        $this->entityManager = $entityManager;
    }

    #[Route('/{lesson}', name: 'post_index_lesson', methods: ['GET'])]
    public function getPostsByLesson(Lesson $lesson, PostRepository $postRepository): JsonResponse
    {
        $listJson = [];
        $list = $postRepository->findBy(["lesson" => $lesson]);
        foreach ($list as $key => $value) {
            $listJson[$key] = $this->postService->postToJson($value);
        }
        return new JsonResponse($listJson);
    }

    #[Route('/{user}', name: 'post_index_user', methods: ['GET'])]
    public function getPostsByUser(User $user, PostRepository $postRepository, UserRepository $userRepository): JsonResponse
    {
        $userEntity = $userRepository->find($user);
        if (!$userEntity) {
            throw new NotFoundHttpException('User not found');
        }

        $listJson = [];
        $list = $postRepository->findBy(["user" => $userEntity]);
        foreach ($list as $key => $value) {
            $listJson[$key] = $this->postService->postToJson($value);
        }
        return new JsonResponse($listJson);
    }

    #[Route('/{user}/{lesson}', name: 'post_index_user_lesson', methods: ['GET'])]
    public function getPostsByUserAndLesson(User $user, Lesson $lesson, PostRepository $postRepository): JsonResponse
    {
        $listJson = [];
        $list = $postRepository->findBy(["user" => $user, 'lesson' => $lesson]);
        foreach ($list as $key => $value) {
            $listJson[$key] = $this->postService->postToJson($value);
        }
        return new JsonResponse($listJson);
    }

    #[Route('/{user}/{lesson}/new', name: 'post_new_lesson', methods: ['POST'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: Object::class,
            example: [
                "title" => "1st Post",
                "content" => "This is the description for the first post",
                "mediaPath" => "teeeeeest",
                "postType" => "test",
                "categories" => ["Art", "Science", "Music"]
            ]
        )
    )]
    public function LessonPost(User $user, Lesson $lesson, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $categoryTitles = $data['categories'];
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->submit($data);

        if ($form->isSubmitted()) {
            foreach ($categoryTitles as $categoryTitle) {
                $category = $entityManager->getRepository(Category::class)->findOneBy(['title' => $categoryTitle]);
                $post->addCategory($category);
            }
            $post->setAddedDate(new \DateTime());
            $post->setUser($user);
            $post->setLesson($lesson);
            $entityManager->persist($post);
            $entityManager->flush();
        }

        return new JsonResponse(true);
    }

    #[Route('/{user}/new', name: 'post_new_user', methods: ['POST'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: Object::class,
            example: [
                "title" => "1st Post",
                "content" => "This is the description for the first post",
                "mediaPath" => "teeeeeest",
                "postType" => "test",
                "categories" => ["Art", "Science", "Music"]
            ]
        )
    )]
    public function UserPost(User $user, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $categoryTitles = $data['categories'];
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->submit($data);

        if ($form->isSubmitted()) {
            foreach ($categoryTitles as $categoryTitle) {
                $category = $entityManager->getRepository(Category::class)->findOneBy(['title' => $categoryTitle]);
                $post->addCategory($category);
            }
            $post->setAddedDate(new \DateTime());
            $post->setUser($user);
            $entityManager->persist($post);
            $entityManager->flush();
        }

        return new JsonResponse(true);
    }

    #[Route('/{id}', name: 'post_show', methods: ['GET'])]
    public function show($id, PostRepository $postRepository): Response
    {
        $post = $postRepository->find($id);
        $post = $this->postService->postToJson($post);
        return new JsonResponse($post);
    }

    #[Route('/{id}/edit', name: 'post_edit', methods: ['PUT'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: Object::class,
            example: [
                "title" => "1st Post222",
                "content" => "This is the description for the first post222",
                "mediaPath" => "teeeeeest222",
                "postType" => "test"
            ]
        )
    )]
    public function edit($id, Request $request, PostRepository $postRepository, EntityManagerInterface $entityManager): Response
    {
        $post = $postRepository->find($id);

        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(PostRepository::class, $post);
        $form->submit($data);

        if ($form->isSubmitted()) {
            $entityManager->persist($post);
            $entityManager->flush();

            return new JsonResponse(['status' => 'Challenge updated successfully']);
        }

        return new JsonResponse(['error' => 'An error has occured']);
    }

    #[Route('/{id}', name: 'post_delete', methods: ['DELETE'])]
    public function delete($id, PostRepository $postRepository, EntityManagerInterface $entityManager): Response
    {
        $post = $postRepository->find($id);
        if (!$post) {
            throw new NotFoundHttpException('Post not found');
        }

        $entityManager->remove($post);
        $entityManager->flush();

        return new JsonResponse(['status' => 'The Post has been deleted']);
    }

    #[Route('/{id}/react', name: 'post_react', methods: ['POST'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: 'object',
            example: [
                'reaction_name' => 'LIKE',
                'user_id' => 14
            ]
        )
    )]
    public function react(int $id, Request $request): JsonResponse
    {
        $reactionName = $request->request->get('reaction_name');
        $userId = $request->request->get('user_id');

        $this->reactionService->reactToPost($id, $reactionName, $userId);

        return new JsonResponse("Reaction Added!");
    }

    #[Route('/{id}/new', name: 'post_upload', methods: ['POST'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: Object::class,
            example: [
                "title" => "1st Post",
                "content" => "This is the description for the first post",
                "mediaPath" => "teeeeeest",
                "postType" => "test",
                "categories" => ["Art", "Science", "Music"]
            ]
        )
    )]
    public function KidPost(int $id, Request $request): JsonResponse
    {
        $kid = $this->entityManager->getRepository(Kid::class)->find($id);
        if (!$kid) {
            return $this->json(['error' => 'Kid not found'], 404);
        }

        $data = json_decode($request->getContent(), true);
        try {
            $post = $this->postService->createPost($kid, $data);
            return $this->json([
                'message' => 'Post created successfully',
                'postId' => $post->getId()
            ], 201);
        } catch (\Exception $e) {
            return $this->json(['error' => $e->getMessage()], 400);
        }
    }
}
