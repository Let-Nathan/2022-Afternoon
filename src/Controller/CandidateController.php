<?php

namespace App\Controller;

use App\Repository\CandidateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Candidate;
use App\Form\CandidateType;

class CandidateController extends AbstractController
{
    #[Route('/candidates', name: 'candidate_index')]
    public function index(CandidateRepository $candidates): Response
    {
        return $this->render('Candidate/index.html.twig', [
            'candidates' => $candidates->findBy([], ['validateSheet' => 'ASC']),
        ]);
    }

    #[Route('/candidates/{id}/cv', name: 'candidate_CV')]
    public function edit(Request $request, Candidate $candidate, CandidateRepository $candidateRepository): Response
    {
        $form = $this->createForm(CandidateType::class, $candidate);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $candidateRepository->add($candidate, true);
            $this->addFlash('success', 'Candidat modifié');

            return $this->redirectToRoute('candidate_index');
        }

        return $this->renderForm('Candidate/cv.html.twig', [
            'candidate' => $candidate,
            'form' => $form,
        ]);
    }
    #[Route('/candidates/{id}', name: 'candidate_show', methods: ['GET'])]
    public function show(Candidate $candidate): Response
    {
        return $this->render('Candidate/show.html.twig', [
            'candidate' => $candidate,
        ]);
    }

    #[Route('/candidates/delete/{id}', name: 'candidate_delete', methods: ['GET'])]
    public function delete(Request $request, Candidate $candidate, CandidateRepository $candidateRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $candidate->getId(), $request->request->get('_token'))) {
            $candidateRepository->remove($candidate, true);
        }

        return $this->redirectToRoute('app_candidate_index', [], Response::HTTP_SEE_OTHER);
    }


    #[Route('/candidate/new', name: 'candidate_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CandidateRepository $candidateRepository): Response
    {
        $candidate = new Candidate();
        $form = $this->createForm(CandidateType::class, $candidate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $candidateRepository->add($candidate, true);

            $this->addFlash('success', 'Candidat créé');

            return $this->redirectToRoute('candidate_show', [
                'id' => $candidate->getId(),
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('Candidate/new.html.twig', [
            'candidate' => $candidate,
            'form' => $form,
        ]);
    }
}
