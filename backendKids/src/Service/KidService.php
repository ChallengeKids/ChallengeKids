<?php

namespace App\Service;

use App\Entity\Category;
use App\Entity\Challenge;
use App\Entity\Kid;
use App\Entity\Post;
use App\Entity\User;
use App\Repository\ChallengeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use phpDocumentor\Reflection\Types\Integer;

class KidService
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager = null)
    {
        $this->entityManager = $entityManager;
    }

    public function kidToJson(Kid $kid)
    {
        $challenges = $kid->getChallenges()->toArray();
        $responses = $kid->getResponses()->toArray();

        return [
            'id' => $kid->getId(),
            'firstName' => $kid->getFirstName(),
            'secondName' => $kid->getSecondName(),
            'email' => $kid->getEmail(),
            'registrationDate' => $kid->getRegistrationDate()->format('Y-m-d H:i:s'),
            'birthDate' => $kid->getBirthDate()->format('Y-m-d'),
            'interests' => $kid->getInterests(),
            'friends' => $kid->getFriends(),
            'points' => $kid->getPoints(),
            'level' => $kid->getLevel(),
            'challenges' => $challenges,
            'responses' => $responses,
        ];
    }

    public function serializeFriendData(User $friendData)
    {
        return [
            'firstName' => $friendData->getFirstName(),
            'secondName' => $friendData->getSecondName(),
            'email' => $friendData->getEmail(),
        ];
    }

    public function updateCategories(int $kidId, array $categoryTitles)
    {
        $kid = $this->entityManager->getRepository(Kid::class)->find($kidId);
        if (!$kidId) {
            throw new Exception("kid not found");
        }

        foreach ($categoryTitles as $categoryTitle) {
            $category = $this->entityManager->getRepository(Category::class)->findOneBy(['title' => $categoryTitle]);
            $kid->addInterest($category);
        }
        $this->entityManager->persist($kid);
        $this->entityManager->flush();
    }

    public function scoreChallenge(Kid $kid, Challenge $challenge): int
    {
        $score = 0;

        // get interests titles from the kid
        $interests = array_map(fn ($category) => $category->getTitle(), $kid->getInterests()->toArray());

        // get category titles from the challenge
        $categories = array_map(fn ($category) => $category->getTitle(), $challenge->getCategories()->toArray());

        foreach ($categories as $category) {
            if (in_array($category, $interests))
                $score++;
        }

        return $score;
    }

    public function scorePost(Kid $kid, Post $post): int
    {
        $score = 0;

        // get interests titles from the kid
        $interests = array_map(fn ($category) => $category->getTitle(), $kid->getInterests()->toArray());

        // get category titles from the post
        $categories = array_map(fn ($category) => $category->getTitle(), $post->getCategories()->toArray());

        foreach ($categories as $category) {
            if (in_array($category, $interests))
                $score++;
        }

        return $score;
    }

    public function getChallengesForKid(int $kidId, int $limit = 10): array
    {
        $kid = $this->entityManager->getRepository(Kid::class)->find($kidId);
        if (!$kid) {
            throw new Exception("kid not found");
        }

        $challenges = $this->entityManager->getRepository(Challenge::class)->findAll();

        $scores = [];
        foreach ($challenges as $challenge) {
            $score = $this->scoreChallenge($kid, $challenge);
            $scores[$score][] = $challenge;
        }

        krsort($scores);

        return $scores;
    }

    public function getPostsForKid(int $kidId, int $limit = 10): array
    {
        $kid = $this->entityManager->getRepository(Kid::class)->find($kidId);
        if (!$kid) {
            throw new Exception("kid not found");
        }

        $posts = $this->entityManager->getRepository(Post::class)->findAll();

        $scores = [];
        foreach ($posts as $post) {
            $score = $this->scorePost($kid, $post);
            $scores[$score][] = $post;
        }

        krsort($scores);

        return $scores;
    }

    public function getFriends(int $kidId): array
    {
        $kid = $this->entityManager->getRepository(Kid::class)->find($kidId);
        if (!$kid) {
            throw new Exception("kid not found");
        }

        $friends = $kid->getFriends();

        return $friends;
    }
}
