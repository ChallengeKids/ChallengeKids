<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\User;
use App\Form\PostType;
use App\Repository\PostRepository;
use App\Service\PostService;
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

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    #[Route('/', name: 'post_index', methods: ['GET'])]
    public function index(PostRepository $postRepository): JsonResponse
    {
        $listJson = [];
        $list = $postRepository->findAll();
        foreach ($list as $key => $value) {
            $listJson[$key] = $this->postService->postToJson($value);
        }
        return new JsonResponse($listJson);
    }

    #[Route('/new', name: 'post_new', methods: ['POST'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: Object::class,
            example: [
                "title" => "1st Post",
                "content" => "This is the description for the first post",
                "mediaPath" => "teeeeeest",
                "postType" => "test",
                "user_id" => 7,
            ]
        )
    )]
    public function new(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $user = $entityManager->getRepository(User::class)->find($data['user_id']);
        if (!$user) {
            return $this->json(['error' => 'Lesson not found'], Response::HTTP_NOT_FOUND);
        }

        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->submit($data);

        if ($form->isSubmitted()) {
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
}
