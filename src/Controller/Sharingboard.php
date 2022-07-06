<?php

namespace App\Controller;

use App\Form\Sharing\SearchSharingType;
use App\Form\Sharing\SharingModel;
use App\Repository\CandidateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sharingboard', name: 'app_sharingboard')]
class Sharingboard extends AbstractController
{
    /**
     * @TODO Form & Model search consultation
     */
    #[Route('/', name: 'app_sharingboard_index')]
    public function index(CandidateRepository $candidateRepository, Request $request): Response
    {
        // New object to get data before performing custom query

        $form = $this->createForm(SearchSharingType::class, new SharingModel(), ['method' => 'GET']);
        var_dump($form->isSubmitted());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $form->getData();
            return $this->renderForm('SharingBoard/sharingboard.html.twig');
        }

        return $this->renderForm('SharingBoard/sharingboard.html.twig', [
            'candidates' => $candidateRepository->findAll(),
            'form' => $form,
        ]);
    }
}
