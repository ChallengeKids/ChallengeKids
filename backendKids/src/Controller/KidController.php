<?php

namespace App\Controller;

use App\Entity\Kid;
use App\Form\KidType;
use App\Repository\KidRepository;
use App\Service\KidService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/api/kid')]
#[OA\Tag(name: 'Kid')]
class KidController extends AbstractController
{
    private $kidService;

    public function __construct(KidService $kidService)
    {
        $this->kidService = $kidService;
    }

    #[Route('/', name: 'app_kid_index', methods: ['GET'])]
    public function index(KidRepository $kidRepository): JsonResponse
    {
        $listJson = [];
        $list = $kidRepository->findAll();
        foreach ($list as $key => $value) {
            $listJson[$key] = $this->kidService->kidToJson($value);
        }
        return new JsonResponse($listJson);
    }

    #[Route('/new', name: 'app_kid_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $kid = new Kid();
        $form = $this->createForm(KidType::class, $kid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($kid);
            $entityManager->flush();

            return $this->redirectToRoute('app_kid_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('kid/new.html.twig', [
            'kid' => $kid,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_kid_show', methods: ['GET'])]
    public function show(Kid $kid): Response
    {
        return $this->render('kid/show.html.twig', [
            'kid' => $kid,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_kid_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Kid $kid, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(KidType::class, $kid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_kid_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('kid/edit.html.twig', [
            'kid' => $kid,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_kid_delete', methods: ['POST'])]
    public function delete(Request $request, Kid $kid, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $kid->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($kid);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_kid_index', [], Response::HTTP_SEE_OTHER);
    }
}
