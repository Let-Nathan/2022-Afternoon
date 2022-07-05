<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Form\AdminType;
use App\Repository\AdminRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

    #[Route('/admin/new', name: 'admin_new')]
    public function new(Request $request, AdminRepository $adminRepository): Response
    {
        $admin = new Admin();
        $form = $this->createForm(AdminType::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $adminRepository->add($admin, true);

            return $this->redirectToRoute('Admin/accountAdmin.html.twig');
        }

        return $this->renderForm('Admin/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/admin/{id}/edit', name: 'edit_admin', methods: ['GET', 'POST'])]
    public function edit(Request $request, Admin $admin, EntityManagerInterface $entityManager): Response
    {

        $form = $this->createForm(AdminType::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('/admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('Admin/edit.html.twig', [
            'admin' => $admin,
            'form' => $form,
        ]);
    }
}
