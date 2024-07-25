<?php

namespace App\Service;

use App\Entity\Category;
use App\Entity\Kid;
use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;

class PostService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function postToJson(Post $post)
    {
        return [
            'id' => $post->getId(),
            'title' => $post->getTitle(),
            'content' => $post->getContent(),
            'mediaPath' => $post->getMediaPath(),
            'addedDate' => $post->getAddedDate()->format('Y-m-d H:i:s'),
            'category' => $post->getCategories(),
            'postType' => $post->getPostType(),
            'lesson' => $post->getLesson(),
            'user' => $post->getUser(),
        ];
    }

    public function createPost(Kid $kid, array $data): Post
    {
        $post = new Post();
        $post->setTitle($data['title']);
        $post->setContent($data['content']);
        $post->setMediaPath($data['mediaPath'] ?? null);
        $post->setAddedDate(new \DateTime());
        $post->setPostType($data['postType']);
        $post->setUser($kid);
        $this->handleCategories($post, $data['categories'] ?? []);
        $this->entityManager->persist($post);
        $this->entityManager->flush();
        return $post;
    }
    public function handleCategories(Post $post, array $categoryIds): void
    {
        $categoryRepository = $this->entityManager->getRepository(Category::class);
        foreach ($categoryIds as $categoryId) {
            $category = $this->$categoryRepository->find($categoryId);
            if ($category) {
                $post->addCategory($category);
            }
        }
    }
}
