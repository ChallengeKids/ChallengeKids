<?php

namespace App\Service;

use App\Entity\Challenge;

class ChallengeService
{
    private $categoryService;

    function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function challengeToJson(Challenge $challenge)
    {
        $categories = $challenge->getCategories()->toArray();
        $coach = $challenge->getCoach();
        return [
            'id' => $challenge->getId(),
            'title' => $challenge->getTitle(),
            'description' => $challenge->getDescription(),
            'category' => $challenge->getCategories(),
            'imageFileName' => $challenge->getImageFileName(),
            'kid' => $challenge->getKid(),
            'coach' => $coach->getId(),
            'categories' => array_map(function ($category) {
                return $this->categoryService->categoryToJson($category);
            }, $categories)
        ];
    }
}
