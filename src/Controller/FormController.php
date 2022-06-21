<?php

namespace App\Controller;

use App\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Candidate;
use App\Form\CandidateType;

class FormController extends AbstractController
{
    #[Route('/form', name: 'app_form')]
    public function index(): Response
    {
        $candidate = new Candidate();
        $form = $this->createForm(CandidateType::class, $candidate);

        return $this->renderForm('form/index.html.twig', [
            'form' => $form,
        ]);
    }
}
