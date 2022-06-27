<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class Sharingboard extends AbstractController
{
    #[Route('/sharingboard', name: 'app_sharingboard')]
    public function sharingboard(UserRepository $user): Response
    {
        return $this->render('sharingboard.html.twig', [
            'users' => $user->findBy([], ['id' => 'DESC'], 8)
        ]);
    }

    #[Route('/api', name: 'api_index')]
    public function api(UserRepository $user, SerializerInterface $serializer): JsonResponse
    {
        $users = $user->findAll();
        return $this->json(
            $users
        );
    }
}
