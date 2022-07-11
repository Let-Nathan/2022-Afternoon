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
class SharingController extends AbstractController
{
    /**
     * @TODO Query
     */
    #[Route('/', name: 'app_sharingboard_index')]
    public function index(Request $request, ConsultationRepository $consultationRep): Response
    {
        $filterModel = new FilterModel();
        $form = $this->createForm(FilterType::class, $filterModel);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $consultations = $consultationRep->searchWithFilter($form->getData());
            //if empty result ?
        } else {
            $consultations = $consultationRep->findBy([], ['id' => 'DESC']);
        }

        return $this->renderForm('SharingBoard/sharingboard.html.twig', [
            'consultations' => $consultations,
            'form' => $form,
        ]);
    }

    // Delete consultation //
    #[Route('/delete/{id}', name: 'app_sharingboard_delete')]
    public function delete(Consultation $consultation, ConsultationRepository $consultationRep): Response
    {
        $consultationRep->remove($consultation, true);
        $this->addFlash('alert-success', 'La consultation à bien été supprimée');
        return $this->redirectToRoute('app_sharingboard_index');
    }
}
