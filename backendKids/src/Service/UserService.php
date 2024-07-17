<?php

namespace App\Service;

use App\Entity\User;

class UserService
{
    public function userToJson(User $user)
    {
        $posts = $user->getPosts()->toArray();

        return [
            'id' => $user->getId(),
            'firstName' => $user->getFirstName(),
            'secondName' => $user->getSecondName(),
            'email' => $user->getEmail(),
            'registrationDate' => $user->getRegistrationDate()->format('Y-m-d H:i:s'),
            'birthDate' => $user->getBirthDate()->format('Y-m-d'),
            'posts' => $posts,
        ];
    }
}
