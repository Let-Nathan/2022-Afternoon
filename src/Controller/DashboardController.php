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
    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(
        CandidateRepository $candidateRepository,
        ConsultationRepository $cRepo,
    ): Response {
        return $this->render('dashboard.html.twig', [
            'countShare' => $candidateRepository->countIsVisible(),
            'consultation' => $cRepo->findBy([], ['id' => 'DESC']),
            'refused' => $cRepo->statusRefused(),
            'present' => $cRepo->statusPresent(),
            'jobInterview' => $cRepo->statusJobInteview(),
        ]);
    }
}
