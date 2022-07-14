<?php

namespace App\Controller;

use App\Repository\CandidateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Candidate;
use App\Form\CandidateType;

class CandidateController extends AbstractController
{
    #[Route('/candidates', name: 'candidate_index')]
    public function index(CandidateRepository $candidates): Response
    {
        return $this->render('candidate/index.html.twig', [
            'candidates' => $candidates->findAll(),
        ]);
    }

    #[Route('/candidates/{id}/cv', name: 'candidate_CV')]
    public function edit(CandidateRepository $candidates, Candidate $candidate): Response
    {
        // $form = $this->createForm(CandidateType::class, $candidate);

        return $this->render('candidate/cv.html.twig', [
            'candidate' => $candidate,
        ]);
    }
}
