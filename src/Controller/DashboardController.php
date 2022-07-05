<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\CandidateRepository;
use App\Repository\ConsultationRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(
        UserRepository $userRepository,
        CandidateRepository $candidateRepository,
        ConsultationRepository $cRepo
    ): Response {
        return $this->render('dashboard.html.twig', [
            'users' => $userRepository->findBy([], ['id' => 'DESC'], 5),
            'countShare' => $candidateRepository->countIsVisible(),
            'refused' => $cRepo->statusRefused(),
            'present' => $cRepo->statusPresent(),
            'jobInterview' => $cRepo->statusJobInteview(),
        ]);
    }
}
