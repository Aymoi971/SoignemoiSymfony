<?php

namespace App\Controller\Patient;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProfilController extends AbstractController
{
    #[Route('/patient/profil', name: 'app_patient_profil')]
    public function index(): Response
    {
        return $this->render('patient/profil/index.html.twig', [
            'controller_name' => 'ProfilController',
        ]);
    }
}
