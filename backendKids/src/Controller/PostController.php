<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Lesson;
use App\Entity\Post;
use App\Entity\User;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use App\Service\PostService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

#[Route('/api/post')]
#[OA\Tag(name: 'Post')]
class PostController extends AbstractController
{
    private $postService;
    private $entityManager;
    public function __construct(PostService $postService, EntityManagerInterface $entityManager)
    {
        $this->postService = $postService;
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'post_show_all', methods: ['GET'])]
    public function getAllPosts(PostRepository $postRepository): JsonResponse
    {
        $listJson = [];
        $list = $postRepository->findAll();
        foreach ($list as $key => $value) {
            $listJson[$key] = $this->postService->postToJson($value);
        }
        return new JsonResponse($listJson);
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

    #[Route('/{userId}/new', name: 'post_new_upload', methods: ['POST'])]
    #[OA\Post(
        summary: 'Add a new post',
        description: 'Creates a new post for the specified user.',
        requestBody: new OA\RequestBody(
            description: 'Request body for adding a new post',
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
                                property: 'content',
                                type: 'string',
                                example: 'tahki yasser'
                            ),
                            new OA\Property(
                                property: 'mediaFileName',
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
                        ],
                        required: ['title', 'content']
                    )
                )
            ]
        ),
    )]
    public function addPost(Request $request, $userId): JsonResponse
    {
        $user = $this->entityManager->getRepository(User::class)->find($userId);

        $post = new Post();
        $post->setUser($user);
        $title = $request->request->get('title');
        $content = $request->request->get('content');
        $mediaFile = $request->files->get('mediaFileName');
        $categoryTitles = $request->request->get('categories');

        if (!$title || !$content) {
            return new JsonResponse(['success' => false, 'message' => 'Title and content are required.'], 400);
        }

        $post->setTitle($title);
        $post->setContent($content);
        $post->setAddedDate(new \DateTime());

        if ($mediaFile instanceof UploadedFile) {

            $fileName = uniqid() . '.' . $mediaFile->guessExtension();

            $uploadsDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads/images';

            $mediaFile->move($uploadsDirectory, $fileName);

            $post->setMediaFileName($fileName);
        } else {

            return new JsonResponse(['message' => 'File upload failed or not recognized.']);
        }

        if ($categoryTitles) {
            $categoryTitlesArray = explode(',', $categoryTitles);

            foreach ($categoryTitlesArray as $categoryTitle) {
                $category = $this->entityManager->getRepository(Category::class)->findOneBy(['title' => trim($categoryTitle)]);
                if ($category) {
                    $post->addCategory($category);
                }
            }
        }


        $this->entityManager->persist($post);
        $this->entityManager->flush();

        return new JsonResponse(['success' => true, 'message' => 'Post created successfully.']);
    }
}
