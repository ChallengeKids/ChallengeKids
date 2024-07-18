<?php

namespace App\Service;

use App\Entity\Post;

class PostService
{
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
}
