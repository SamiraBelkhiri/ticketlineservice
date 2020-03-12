<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\RegistrationFormType;
use App\Form\ResetPasswordType;
use App\Security\LoginAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

class ResetPasswordController extends AbstractController
{
    /**
     * @Route("/login/resetpassword", name="app_resetpassword")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param GuardAuthenticatorHandler $guardHandler
     * @param LoginAuthenticator $authenticator
     * @return Response
     */
    public function resetPassword(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, LoginAuthenticator $authenticator): Response
    {
        $user = new Users();
        $form = $this->createForm(ResetPasswordType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $userSelected = $this->getDoctrine()->getRepository(Users::class)-> findBy(['email' => $form->get('email')->getData()]);
            if ($userSelected) {
                $user = $userSelected[0];
                $user -> setPassword(
                    $passwordEncoder -> encodePassword(
                        $user,
                        $form -> get('plainPassword') -> getData()
                    )
                );

                $entityManager = $this -> getDoctrine() -> getManager();
                $entityManager -> persist($user);
                $entityManager -> flush();

                // do anything else you need here, like send an email

                return $this -> redirectToRoute('app_login');
            }
        }

        return $this->render('reset_password/index.html.twig', [
            'resetPassword' => $form->createView(),
        ]);
    }
}
