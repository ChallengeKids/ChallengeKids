<?php

namespace App\Service;

use App\Entity\Category;
use App\Service\CategoryService;
use App\Entity\Kid;
use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class PostService
{
    private $entityManager;
    private $slugger;
    private $params;
    private $categoryService;

    public function __construct(EntityManagerInterface $entityManager, SluggerInterface $slugger, ParameterBagInterface $params,CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->entityManager = $entityManager;
        $this->slugger = $slugger;
        $this->params = $params;
    }
    public function postToJson(Post $post)
    {
        $categories=$post->getCategories()->toArray();
        $lesson = $post->getLesson() ?? null;
        return [
            'id' => $post->getId(),
            'title' => $post->getTitle(),
            'content' => $post->getContent(),
            'addedDate' => $post->getAddedDate()->format('Y-m-d H:i:s'),
            'category' => array_map(function ($category) {
                return $this->categoryService->categoryToJson($category);
            },  $categories),
            'lesson' => $lesson,
            'user' => $post->getUser()->getFullName(),
        ];
    }
}
