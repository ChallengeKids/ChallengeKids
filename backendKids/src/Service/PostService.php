<?php

namespace App\Service;

use App\Entity\Category;
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

    public function __construct(EntityManagerInterface $entityManager, SluggerInterface $slugger, ParameterBagInterface $params)
    {
        $this->entityManager = $entityManager;
        $this->slugger = $slugger;
        $this->params = $params;
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

    public function handleFileUpload(Post $post, ?UploadedFile $mediaFile): void
    {

        $fileName = $post->getId() . '-' . uniqid() . '.' . $mediaFile->getClientOriginalExtension();

        $mediaFile->move($this->params->get('kernel.project_dir') . '/public/uploads', $fileName);

        $post->setMediaPath($fileName);
    }
}
