<?php

namespace App\Controller;

use App\Form\Sharing\FilterType;
use App\Form\Sharing\FilterModel;
use App\Repository\CandidateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sharingboard')]
class Sharingboard extends AbstractController
{
    /**
     * @TODO Query
     */
    #[Route('/', name: 'app_sharingboard_index')]
    public function index(CandidateRepository $candidateRepository, Request $request): Response
    {
        $form = $this->createForm(FilterType::class, new FilterModel(), ['method' => 'GET']);
        var_dump($form->isSubmitted());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->renderForm('SharingBoard/sharingboard.html.twig');
        }

        return $this->renderForm('SharingBoard/sharingboard.html.twig', [
            'candidates' => $candidateRepository->findAll(),
            'form' => $form,
        ]);
    }
}
