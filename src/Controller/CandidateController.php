<?php

namespace App\Controller;

use App\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Candidate;
use App\Form\CandidateType;

class CandidateController extends AbstractController
{
    #[Route('/form', name: 'index')]
    public function index(): Response
    {
        return $this->render('candidate/candidate_depose.html.twig');
    }

    #[Route('/form/CV', name: 'CV')]
    public function CV(): Response
    {
        $candidate = new Candidate();
        $form = $this->createForm(CandidateType::class, $candidate);

        return $this->renderForm('form/index.html.twig', [
            'form' => $form,
        ]);
    }
}
