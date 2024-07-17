<?php

namespace App\Service;

use App\Entity\Kid;

class KidService
{
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
}
