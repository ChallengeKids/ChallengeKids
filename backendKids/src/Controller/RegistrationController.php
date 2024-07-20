<?php

namespace App\Controller;

use App\Entity\Coach;
use App\Entity\Kid;
use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;
use PHPUnit\Util\Json;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/api')]
class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register', methods: ['POST'])]
    #[OA\RequestBody(content: new Model(type: RegistrationFormType::class))]
    #[OA\Response(
        response: 200,
        description: 'User successfully registered',
        content: new OA\JsonContent(
            type: 'object',
            properties: [
                new OA\Property(property: 'message', type: 'string')
            ]
        )
    )]
    #[OA\Response(
        response: 400,
        description: 'Invalid input',
        content: new OA\JsonContent(
            type: 'object',
            properties: [
                new OA\Property(property: 'message', type: 'string')
            ]
        )
    )]
    #[OA\Tag(name: 'Registration')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): JsonResponse
    {

        $data = json_decode($request->getContent(), true);

        $form = $this->createForm(RegistrationFormType::class);
        $form->submit($data);

        if ($form->isSubmitted()) {
            $userType = $form->get('userType')->getData();
            if ($userType === 'kid') {
                $user = new Kid();
            } elseif ($userType === 'coach') {
                $user = new Coach();
            } else {
                throw new \Exception('Invalid user type');
            }

            $user->setFirstName($form->get('firstName')->getData());
            $user->setSecondName($form->get('secondName')->getData());
            $user->setEmail($form->get('email')->getData());
            $user->setBirthDate($form->get('birthDate')->getData());

            // Encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $user->setRegistrationDate(new \DateTime());

            $entityManager->persist($user);
            $entityManager->flush();
            return new JsonResponse(true);
        }

        return new JsonResponse(false);

        // return $this->render('registration/register.html.twig', [
        //     'registrationForm' => $form->createView(),
        // ]);
    }
}
