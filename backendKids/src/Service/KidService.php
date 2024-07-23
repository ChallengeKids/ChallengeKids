<?php

namespace App\Service;

use App\Entity\Category;
use App\Entity\Kid;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class KidService
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
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
}
