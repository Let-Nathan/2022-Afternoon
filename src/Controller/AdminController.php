<?php

namespace App\Controller;

use App\Repository\AdminRepository;
use Composer\DependencyResolver\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'account_admin')]
    public function dashboard(AdminRepository $admin): Response
    {
        return $this->render('Admin/accountAdmin.html.twig', [
            'admin' => $admin->findBy(['id' => 'ASC'])
        ]);
    }
}
