<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Entity\User;
use App\Form\SearchSharingType;
use App\Repository\CandidateRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sharingboard', name: 'app_sharingboard')]
class Sharingboard extends AbstractController
{
    /**
     * @TODO Gérer cette merde
     */
    #[Route('/', name: 'app_sharingboard_index')]
    public function index(CandidateRepository $candidateRepository, Request $request): Response
    {
        $form = $this->createForm(SearchSharingType::class, null, ['method' => 'GET']);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            return $this->render('SharingBoard/sharingboard.html.twig', [
                'form' => $form->createView()
            ]);
        }
        return $this->render('SharingBoard/sharingboard.html.twig', [
            'candidates' => $candidateRepository->findAll(),
            'form' => $form->createView(),

        ]);
    }
}
