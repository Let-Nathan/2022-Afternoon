<?php

namespace App\Controller;

use App\Repository\CandidateRepository;
use App\Repository\ConsultationRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @TODO Sommes balance & dues
     * @TODO Montant des fiches
     */
    #[Route('/', name: 'app_dashboard_index')]
    public function dashboard(
        CandidateRepository $candidateRepository,
        ConsultationRepository $cRepo,
        UserRepository $userRepository,
    ): Response {

        return $this->render('dashboard.html.twig', [
            'countPartage' => $candidateRepository->countIsVisible(),
            'users' => $userRepository->findAll(),
            'sumBuyerDue' => $cRepo->sumAcheteurdue(),
            'sumVendeurDue' => $cRepo->sumVendeurdue(),
            'comAfternoon' => $cRepo->sumAfternoonCom(),
            'statusRefused' => $cRepo->statusRefused(),
            'statusAccepted' => $cRepo->statusAccepted(),
            'statusPresent' => $cRepo->statusPresent(),
        ]);
    }
}
