<?php

namespace App\Service;

use App\Entity\Coach;

class CoachService
{
    public function coachToJson(Coach $coach)
    {
        $challenges = $coach->getChallenges()->toArray();
        $posts = $coach->getPosts()->toArray();
        return [
            'id' => $coach->getId(),
            'firstName' => $coach->getFirstName(),
            'secondName' => $coach->getSecondName(),
            'email' => $coach->getEmail(),
            'registrationDate' => $coach->getRegistrationDate()->format('Y-m-d H:i:s'),
            'birthDate' => $coach->getBirthDate()->format('Y-m-d'),
            'teachingDomain' => $coach->getTeachingDomain(),
            'challenges' => $challenges,
            'posts' => $posts,
        ];
    }
}
