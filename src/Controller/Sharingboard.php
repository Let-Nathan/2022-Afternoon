<?php

namespace App\Controller;

use App\Entity\Consultation;
use App\Form\Sharing\FilterModel;
use App\Form\Sharing\FilterType;
use App\Repository\CandidateRepository;
use App\Repository\ConsultationRepository;
use App\Repository\UserRepository;
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
    public function index(UserRepository $userRepository, Request $request, ConsultationRepository $consultationRepository): Response
    {
        $filterModel = new FilterModel();
        $form = $this->createForm(FilterType::class, $filterModel);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $consultations = $consultationRepository->searchWithFilter($form->getData());
        } else {
            $consultations = $consultationRepository->findAll();
        }

        return $this->renderForm('SharingBoard/sharingboard.html.twig', [
            'consultations' => $consultations,
            'form' => $form,
        ]);
    }
}
