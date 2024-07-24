<?php

namespace App\Controller\Patient;

use App\Entity\User;
use App\Entity\Sejour;
use App\Form\NewSejourType;
use App\Util\SejourUtility;
use App\Util\SejourFormUtility;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfilController extends AbstractController
{
    #[Route('/patient/profil', name: 'app_patient_profil')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->gettheUser();
        $categories = SejourUtility::getClassifiedSejours($user);
        // $categories = [];
        $sejour = new Sejour();
        $form = $this->createForm(NewSejourType::class, $sejour);

        $form->handleRequest($request);
        if($user){
            if ($form->isSubmitted() && $form->isValid()) {
                // Validate dates before processing the form
                $formUtility = new SejourFormUtility($entityManager);
                $validation = $formUtility->validateSejour($sejour, $user);
                
                if (!$validation['isValid']) {
                    $this->addFlash('error', $validation['message']);
                } else {
                    $entityManager->persist($validation['sejour']);
                    $entityManager->flush();
    
                    $this->addFlash('success', 'New Sejour has been created successfully.');
                    return $this->redirectToRoute('sejour_show', ['id' => $sejour->getId()]);
                }
            }
        }
        
        dump($categories);
        return $this->render('patient/profil/index.html.twig', [
            'controller_name' => 'ProfilController',
            'categories' => $categories,
            'form' => $form,
            'ressourceName' => 'Nouveau Sejour',
        ]);
    }

    public function gettheUser():?User
    {
        return $this->getUser();
    }
}

    