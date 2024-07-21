<?php

namespace App\Controller;

use App\Entity\Chapter;
use App\Form\ChapterType;
use App\Repository\ChapterRepository;
use App\Service\ChapterService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/api/chapter')]
#[OA\Tag(name: 'Chapter')]
// #[IsGranted('ROLE_KID')]
class ChapterController extends AbstractController
{
    private $chapterService;

    public function __construct(ChapterService $chapterService)
    {
        $this->chapterService = $chapterService;
    }
    #[Route('/', name: 'chapter_index', methods: ['GET'])]
    public function index(ChapterRepository $chapterRepository): JsonResponse
    {
        $listJson = [];
        $list = $chapterRepository->findAll();
        foreach ($list as $key => $value) {
            $listJson[$key] = $this->chapterService->chapterToJson($value);
        }
        return new JsonResponse($listJson);
    }

    #[Route('/new', name: 'chapter_new', methods: ['POST'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: Object::class,
            example: [
                "title" => "Chapter1",
                "description" => "This is a description for the 1st Chapter",
                "chapterNumber" => 3
            ]
        )
    )]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $data = json_decode($request->getContent(), true);

        $chapter = new Chapter();
        $form = $this->createForm(ChapterType::class, $chapter);
        $form->submit($data);

        if ($form->isSubmitted()) {
            $entityManager->persist($chapter);
            $entityManager->flush();
        }

        return new JsonResponse(true);
    }

    #[Route('/{title}', name: 'chapter_show', methods: ['GET'])]
    public function show(ChapterRepository $chapterRepository, $title): Response
    {
        $chapter = $chapterRepository->findOneBy(['title' => $title]);
        $chapter = $this->chapterService->chapterToJson($chapter);
        return new JsonResponse($chapter);
    }

    #[Route('/{id}/edit', name: 'chapter_edit', methods: ['PUT'])]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            type: Object::class,
            example: [
                "title" => "Chapter111",
                "description" => "This is a description for the 111th Chapter",
                "chapterNumber" => 6
            ]
        )
    )]
    public function edit($id, Request $request, ChapterRepository $chapterRepository, EntityManagerInterface $entityManager): Response
    {
        $chapter = $chapterRepository->find($id);

        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(ChapterType::class, $chapter);
        $form->submit($data);

        if ($form->isSubmitted()) {
            $entityManager->persist($chapter);
            $entityManager->flush();

            return new JsonResponse(['status' => 'Chapter updated successfully']);
        }

        return new JsonResponse(['error' => 'An error has occured']);
    }

    #[Route('/delete/{id}', name: 'chapter_delete', methods: ['DELETE'])]
    public function delete($id, ChapterRepository $chapterRepository, EntityManagerInterface $entityManager): Response
    {
        $chapter = $chapterRepository->find($id);
        if (!$chapter) {
            throw new NotFoundHttpException('chapter$chapter not found');
        }

        $entityManager->remove($chapter);
        $entityManager->flush();

        return new JsonResponse(['status' => 'The chapter$chapter has been deleted']);
    }
}
