<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(UserRepository $user): Response
    {
        return $this->render('dashboard.html.twig', [
            'users' => $user->findBy([], ['id' => 'DESC'], 5)
        ]);
    }
}
