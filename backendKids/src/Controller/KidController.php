<?php

namespace App\Controller;

use App\Entity\Kid;
use App\Entity\User;
use App\Form\KidType;
use App\Form\UserPasswordType;
use App\Repository\KidRepository;
use App\Service\KidService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/api/kid')]
#[OA\Tag(name: 'Kid')]
class KidController extends AbstractController
{
    private $kidService;
    private $passwordHasher;
    private $entityManager;
    public function __construct(UserPasswordHasherInterface $passwordHasher, KidService $kidService, EntityManagerInterface $entityManager)
    {
        $this->passwordHasher = $passwordHasher;
        $this->kidService = $kidService;
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'kid_index', methods: ['GET'])]
    public function index(KidRepository $kidRepository): JsonResponse
    {
        $listJson = [];
        $list = $kidRepository->findAll();
        foreach ($list as $key => $value) {
            $listJson[$key] = $this->kidService->kidToJson($value);
        }
        return new JsonResponse($listJson);
    }


    #[Route('/{id}', name: 'kid_show', methods: ['GET'])]
    public function show($id, KidRepository $kidRepository): JsonResponse
    {
        $kid = $kidRepository->find($id);
        $kid = $this->kidService->kidToJson($kid);
        return new JsonResponse($kid);
    }

    #[Route('/{id}/changePassword', name: 'kid_edit', methods: ['PUT'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: Object::class,
            example: [
                "password" => "securepassword",
            ]
        )
    )]

    public function changePassword($id, Request $request, KidRepository $kidRepository): Response
    {
        $kid = $kidRepository->find($id);
        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(UserPasswordType::class, $kid);
        $form->submit($data);

        if ($form->isSubmitted()) {

            $hashedPassword = $this->passwordHasher->hashPassword($kid, $kid->getPassword());
            $kid->setPassword($hashedPassword);
            $this->entityManager->persist($kid);
            $this->entityManager->flush();
        }

        return new JsonResponse(true);
    }

    #[Route('/delete/{id}', name: 'kid_delete', methods: ['DELETE'])]
    public function delete($id, KidRepository $kidRepository): Response
    {
        $kid = $kidRepository->find($id);
        if (!$kid) {
            throw new NotFoundHttpException('Kid not found');
        }

        $this->entityManager->remove($kid);
        $this->entityManager->flush();

        return new JsonResponse(['status' => 'The Kid has been deleted']);
    }

    #[Route('/{idKid}/{idUserToAdd}', name: 'kid_add_friend', methods: ['Post'])]
    public function addFriend($idKid, $idUserToAdd, KidRepository $kidRepository): Response
    {
        $kid = $this->entityManager->getRepository(Kid::class)->find($idKid);
        if (!$kid) {
            throw new NotFoundHttpException('Kid not found');
        }
        $user = $this->entityManager->getRepository(User::class)->find($idUserToAdd);

        $friendData = $this->kidService->serializeFriendData($user);

        $friends = $kid->getFriends();
        $friends[] = $friendData;
        $kid->setFriends($friends);

        $this->entityManager->persist($kid);
        $this->entityManager->flush();

        return new JsonResponse(['status' => 'The Kid has been deleted']);
    }

    #[Route('/{id}/addInterests', name: 'kid_interests_new', methods: ['POST'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: Object::class,
            example: [
                "categoryTitles" => ["Art", "Science", "Music"],
            ]
        )
    )]
    public function addInterests($id, Request $request): JsonResponse
    {
        $data = $request->toArray();
        $categoryTitles = $data['categoryTitles'];
        $this->kidService->updateCategories($id, $categoryTitles);
        return new JsonResponse(['status' => 'Categories updated successfully']);
    }

    #[Route('/{id}/challenges', name: 'get_challenges_for_kid', methods: ['GET'])]
    public function getChallenges(int $id): JsonResponse
    {
        $test = $this->kidService->getChallengesForKid($id, 10);

        // Output the result for debugging
        dd($test);

        return new JsonResponse(true);
    }

    #[Route('/{id}/posts', name: 'get_posts_for_kid', methods: ['GET'])]
    public function getPosts(int $id): JsonResponse
    {
        $test = $this->kidService->getPostsForKid($id, 10);

        // Output the result for debugging
        dd($test);

        return new JsonResponse(true);
    }
}
