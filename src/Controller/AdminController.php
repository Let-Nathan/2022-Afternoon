<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Form\AdminType;
use App\Repository\AdminRepository;
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

        return $this->renderForm('admin/new.html.twig', [
            'form' => $form,
        ]);
    }

    /*

    #[Route('/programs/{slug}/edit', name: 'edit_programs', methods: ['GET', 'POST'])]
    public function edit(Request $request, Program $program, EntityManagerInterface $entityManager): Response
    {

        if (!($this->getUser() == $program->getOwner())) {
            // If not the owner, throws a 403 Access Denied exception
            throw new AccessDeniedException('Only the owner can edit the program!');
        }

        $form = $this->createForm(ProgramType::class, $program);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('program_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('program/edit.html.twig', [
            'program' => $program,
            'form' => $form,
        ]);
    }

    */
}
