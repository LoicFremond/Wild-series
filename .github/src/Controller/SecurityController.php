<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Service\Flash;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/connection", name="app_login")
     * @param AuthenticationUtils $authenticationUtils
     * @param CategoryRepository  $categoryRepository
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils, CategoryRepository $categoryRepository): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'security/login.html.twig', [
                'last_username' => $lastUsername,
                'error' => $error,
                'categories' => $categoryRepository->findAll(),
            ]
        );
    }

    /**
     * @Route("/deconnection", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
