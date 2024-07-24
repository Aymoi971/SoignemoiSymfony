<?php

namespace App\Controller\Gestion;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MedecinsController extends AbstractController
{
    #[Route('/gestion/medecins', name: 'app_gestion_medecins')]
    public function index(): Response
    {
        return $this->render('gestion/medecins/index.html.twig', [
            'controller_name' => 'MedecinsController',
        ]);
    }
}
