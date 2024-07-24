<?php

namespace App\Util;

use App\Entity\Patient;
use App\Entity\Sejour;
use App\Entity\User;
use DateTime;

class SejourUtility
{
    /**
     * Get classified Sejour objects for the current user
     *
     * @param User $user The current logged-in user
     * @return array Classified Sejour objects
     */
    public static function getClassifiedSejours(?User $user): array
    {
        $result = [
            'Sejour' => [
                'past' => [],
                'present' => [],
                'future' => [],
            ]
        ];
        if (!$user){
            return [];
        }
        $patient = $user->getPatient();
        if (!$patient instanceof Patient) {
            return $result;
        }

        $sejours = $patient->getSejours();
        $today = new DateTime();

        foreach ($sejours as $sejour) {
            if (!$sejour instanceof Sejour) {
                continue;
            }

            $dateIn = $sejour->getDateIn();
            $dateOut = $sejour->getDateOut();
            $specialty = $sejour->getSpecialty();

            // Create the string representation
            $sejourString = $dateIn->format('Y-m-d') . ' ' . $specialty;

            if ($dateOut < $today) {
                $result['Sejour']['past'][] = $sejourString;
            } elseif ($dateIn > $today) {
                $result['Sejour']['future'][] = $sejourString;
            } else {
                $result['Sejour']['present'][] = $sejourString;
            }
        }

        return $result;
    }
}