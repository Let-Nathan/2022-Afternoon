<?php

namespace App\Controller;

use App\Entity\Consultation;
use App\Entity\User;
use App\Repository\CandidateRepository;
use App\Repository\ConsultationRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @TODO Sommes balance & dues
     * @TODO Montant des fiches
     */
    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(
        CandidateRepository $candidateRepository,
        ConsultationRepository $cRepo,
        UserRepository $userRepository,
    ): Response {

        return $this->render('dashboard.html.twig', [
            'countNbrShare' => $candidateRepository->countIsVisible(),
            'users' => $userRepository->findAll(),
            'countNbrRefused' => $cRepo->statusRefused(),
            'countNbrAccepted' => $cRepo->statusAccepted(),
            'countNbrJobInterview' => $cRepo->statusJobInteview(),
        ]);
    }
}
