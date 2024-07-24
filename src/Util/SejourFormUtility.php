<?php

namespace App\Util;

use App\Entity\User;
use App\Entity\Sejour;
use App\Entity\Medecin;
use App\Entity\Patient;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SejourFormUtility extends AbstractType
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function validateSejour(Sejour $sejour, User $user){
        if($this->validateSejourDates($sejour, $user)===true){
            $this->addSpecialty($sejour);
            return ['isValid' => true, 'message' => 'Le Sejour est Valide.', 'sejour' => $sejour];
        } else {
            return [
                'isValid' => false,
                'message' => 'The requested dates overlap with an existing Sejour from '];    
        }
        
            
        }
    public function validateSejourDates(Sejour $sejour, User $user): array
    {
        $dateIn = $sejour->getDateIn();
        $dateOut = $sejour->getDateOut();

        $patient = $user->getPatient();
        if (!$patient instanceof Patient) {
            return ['isValid' => false, 'message' => 'User is not associated with a patient.'];
        }

        $existingSejours = $this->entityManager->getRepository(Sejour::class)->findBy(['Patient' => $patient]);

        foreach ($existingSejours as $existingSejour) {
            $existingDateIn = $existingSejour->getDateIn();
            $existingDateOut = $existingSejour->getDateOut();

            if (
                ($dateIn >= $existingDateIn && $dateIn < $existingDateOut) ||
                ($dateOut > $existingDateIn && $dateOut <= $existingDateOut) ||
                ($dateIn <= $existingDateIn && $dateOut >= $existingDateOut)
            ) {
                return $existingSejour;
            }
        }

        return true;
    }

    public function addSpecialty(Sejour $sejour){
        $medecin = $sejour->getMedecin();
                if ($medecin) {
                    $sejour->setSpecialty($medecin->getSpecialty());
                }
    }
    public function validateSejourDatesRequest(Request $request, User $user): array
    {
        $data = $request->request->all();
        $dateIn = new \DateTime($data['dateIn']);
        $dateOut = new \DateTime($data['dateOut']);

        $patient = $user->getPatient();
        if (!$patient instanceof Patient) {
            return ['isValid' => false, 'message' => 'User is not associated with a patient.'];
        }

        $existingSejours = $this->entityManager->getRepository(Sejour::class)->findBy(['Patient' => $patient]);

        foreach ($existingSejours as $existingSejour) {
            $existingDateIn = $existingSejour->getDateIn();
            $existingDateOut = $existingSejour->getDateOut();

            if (
                ($dateIn >= $existingDateIn && $dateIn < $existingDateOut) ||
                ($dateOut > $existingDateIn && $dateOut <= $existingDateOut) ||
                ($dateIn <= $existingDateIn && $dateOut >= $existingDateOut)
            ) {
                return [
                    'isValid' => false,
                    'message' => 'The requested dates overlap with an existing Sejour from ' .
                        $existingDateIn->format('Y-m-d') . ' to ' . $existingDateOut->format('Y-m-d') . '.'
                ];
            }
        }

        return ['isValid' => true, 'message' => 'The requested dates are valid.'];
    }
}