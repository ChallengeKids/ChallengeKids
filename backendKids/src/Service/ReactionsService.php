<?php

namespace App\Service;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class Reactionservice
{
    private $entityManager;

    public const LIKE = 'LIKE';
    public const LOVE = 'LOVE';
    public const HAHA = 'HAHA';
    public const WOW = 'WOW';
    public const SAD = 'SAD';
    public const ANGRY = 'ANGRY';

    public function __construct(EntityManagerInterface $entityManager = null)
    {
        $this->entityManager = $entityManager;
    }

    public static function getAllReactions(): array
    {
        return [
            self::LIKE,
            self::LOVE,
            self::HAHA,
            self::WOW,
            self::SAD,
            self::ANGRY,
        ];
    }

    public function reactToPost(int $postId, string $reactionName, int $userId)
    {
        $validReactions = ['Like', 'Love', 'Haha', 'Wow', 'Sad', 'Angry'];

        if (!in_array($reactionName, $validReactions)) {
            throw new Exception("Invalid Reaction");
        }

        $post = $this->entityManager->getRepository(Post::class)->find($postId);

        if (!$post) {
            throw new Exception("Post Not Found");
        }

        $reactions = $post->getReactions();
        $reactions[$userId] = $reactionName;

        $post->setReactions($reactions);
        $this->entityManager->persist($post);
        $this->entityManager->flush();
    }
}
