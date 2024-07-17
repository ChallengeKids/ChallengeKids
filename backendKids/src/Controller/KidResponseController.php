<?php

namespace App\Controller;

use App\Entity\KidResponse;
use App\Form\ResponseType;
use App\Repository\KidResponseRepository;
use App\Service\KidResponseService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/api/kidResponse')]
#[OA\Tag(name: 'KidResponse')]
class KidResponseController extends AbstractController
{
    private $kidResponseService;

    public function __construct(KidResponseService $kidResponseService)
    {
        $this->kidResponseService = $kidResponseService;
    }

    #[Route('/', name: 'app_response_index', methods: ['GET'])]
    public function index(KidResponseRepository $responseRepository): JsonResponse
    {
        $listJson = [];
        $list = $responseRepository->findAll();
        foreach ($list as $key => $value) {
            $listJson[$key] = $this->kidResponseService->kidResponseToJson($value);
        }
        return new JsonResponse($listJson);
    }

    #[Route('/new', name: 'app_response_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $response = new Response();
        $form = $this->createForm(ResponseType::class, $response);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($response);
            $entityManager->flush();

            return $this->redirectToRoute('app_response_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('response/new.html.twig', [
            'response' => $response,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_response_show', methods: ['GET'])]
    public function show(Response $response): Response
    {
        return $this->render('response/show.html.twig', [
            'response' => $response,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_response_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Response $response, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ResponseType::class, $response);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_response_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('response/edit.html.twig', [
            'response' => $response,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_response_delete', methods: ['POST'])]
    public function delete(Request $request, KidResponse $response, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $response->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($response);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_response_index', [], Response::HTTP_SEE_OTHER);
    }
}
