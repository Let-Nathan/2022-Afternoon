<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Form\AdminType;
use App\Repository\AdminRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'account_admin')]
    public function dashboard(AdminRepository $adminRepository): Response
    {
        return $this->render('Admin/accountAdmin.html.twig', [
            'admins' => $adminRepository->findAll(),
        ]);
    }

    #[Route('/admin/new', name: 'admin_new')]
    public function new(Request $request, AdminRepository $adminRepository, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $admin = new Admin();
        $form = $this->createForm(AdminType::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $form->get('password')->getData();
            $hash = $userPasswordHasher->hashPassword($admin, $password);
            $admin->setPassword($hash);

            $adminRepository->add($admin, true);

            return $this->redirectToRoute('account_admin');
        }

        return $this->renderForm('Admin/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/admin/{id}/edit', name: 'edit_admin', methods: ['GET', 'POST'])]
    public function edit(Request $request, Admin $admin, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $form = $this->createForm(AdminType::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $form->get('password')->getData();

            if ($password) {
                $hash = $userPasswordHasher->hashPassword($admin, $password);
                $admin->setPassword($hash);
            }

            $entityManager->flush();

            return $this->redirectToRoute('account_admin');
        }

        return $this->renderForm('Admin/edit.html.twig', [
            'admin' => $admin,
            'form' => $form,
        ]);
    }

    #[Route('/admin{id}', name: 'account_admin_delete', methods: ['POST'])]
    public function delete(Admin $admin, Request $request, EntityManagerInterface $entityManager): Response
    {

        if ($this->isCsrfTokenValid('delete' . $admin->getId(), $request->request->get('_token'))) {
            $entityManager->remove($admin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('account_admin', [], Response::HTTP_SEE_OTHER);
    }
}
