<?php

namespace App\Service;

use App\Entity\Challenge;

class ChallengeService
{
    public function challengeToJson(Challenge $challenge)
    {
        return [
            'title' => $challenge->getTitle(),
            'description' => $challenge->getDescription(),
            'category' => $challenge->getCategories(),
            'kid' => $challenge->getKid(),
            'coach' => $challenge->getCoach(),
        ];
    }
}
