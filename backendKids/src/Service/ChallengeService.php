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
        return [
            'title' => $challenge->getTitle(),
            'description' => $challenge->getDescription(),
            'category' => $challenge->getCategories(),
            'kid' => $challenge->getKid(),
            'coach' => $challenge->getCoach(),
            'categories' => array_map(function ($category) {
                return $this->categoryService->categoryToJson($category);
            }, $categories)
        ];
    }
}
