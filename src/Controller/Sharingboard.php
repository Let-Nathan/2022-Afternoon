<?php

namespace App\Controller;

use App\Repository\CandidateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sharingboard')]
class Sharingboard extends AbstractController
{
    /**
     * @TODO Form & Model search consultation
     */
    #[Route('/', name: 'app_sharingboard_index')]
    public function index(CandidateRepository $candidateRepository, Request $request): Response
    {
        return $this->render('SharingBoard/sharingboard.html.twig', [
            'candidates' => $candidateRepository->findAll(),

        ]);
    }
}
