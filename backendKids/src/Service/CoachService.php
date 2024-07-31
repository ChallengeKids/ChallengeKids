<?php

namespace App\Service;

use App\Entity\Category;
use App\Entity\Coach;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class CoachService
{

    private $entityManager;
    private $categoryService;

    public function __construct(EntityManagerInterface $entityManager, CategoryService $categoryService)
    {
        $this->entityManager = $entityManager;
        $this->categoryService = $categoryService;
    }
    public function coachToJson(Coach $coach)
    {
        $challenges = $coach->getChallenges()->toArray();
        $categories = $coach->getTeachingDomains()->toArray();
        $posts = $coach->getPosts()->toArray();
        return [
            'id' => $coach->getId(),
            'fullName' => $coach->getFullName(),
            'email' => $coach->getEmail(),
            'registrationDate' => $coach->getRegistrationDate()->format('Y-m-d H:i:s'),
            'teachingDomain' => array_map(function ($category) {
                return $this->categoryService->categoryToJson($category);
            }, $categories),
            'challenges' => $challenges,
            'posts' => $posts,
        ];
    }

    public function updateCategories(int $coachId, array $categoryTitles)
    {
        $coach = $this->entityManager->getRepository(Coach::class)->find($coachId);
        if (!$coachId) {
            throw new Exception("kid not found");
        }

        foreach ($categoryTitles as $categoryTitle) {
            $category = $this->entityManager->getRepository(Category::class)->findOneBy(['title' => $categoryTitle]);
            $coach->addTeachingDomain($category);
        }
        $this->entityManager->persist($coach);
        $this->entityManager->flush();
    }
}
