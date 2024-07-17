<?php

namespace App\Controller;

use App\Entity\KidParent;
use App\Form\KidParentType;
use App\Repository\KidParentRepository;
use App\Service\KidParentService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/api/kid/parent')]
#[OA\Tag(name: 'Parent')]
class KidParentController extends AbstractController
{
    private $kidParentService;

    public function __construct(KidParentService $kidParentService)
    {
        $this->kidParentService = $kidParentService;
    }
    #[Route('/', name: 'app_kid_parent_index', methods: ['GET'])]
    public function index(KidParentRepository $kidParentRepository): JsonResponse
    {
        $listJson = [];
        $list = $kidParentRepository->findAll();
        foreach ($list as $key => $value) {
            $listJson[$key] = $this->kidParentService->kidParentToJson($value);
        }
        return new JsonResponse($listJson);
    }

    #[Route('/new', name: 'app_kid_parent_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $kidParent = new KidParent();
        $form = $this->createForm(KidParentType::class, $kidParent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($kidParent);
            $entityManager->flush();

            return $this->redirectToRoute('app_kid_parent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('kid_parent/new.html.twig', [
            'kid_parent' => $kidParent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_kid_parent_show', methods: ['GET'])]
    public function show(KidParent $kidParent): Response
    {
        return $this->render('kid_parent/show.html.twig', [
            'kid_parent' => $kidParent,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_kid_parent_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, KidParent $kidParent, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(KidParentType::class, $kidParent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_kid_parent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('kid_parent/edit.html.twig', [
            'kid_parent' => $kidParent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_kid_parent_delete', methods: ['POST'])]
    public function delete(Request $request, KidParent $kidParent, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $kidParent->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($kidParent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_kid_parent_index', [], Response::HTTP_SEE_OTHER);
    }
}
