<?php

namespace App\Form;

use App\Entity\Medecin;
use App\Entity\Sejour;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewSejourType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateIn', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date d\'entrée',
            ])
            ->add('dateOut', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date de sortie',
            ])
            ->add('motif', TextType::class, [
                'label' => 'Motif',
            ])
            ->add('Medecin', EntityType::class, [
                'class' => Medecin::class,
                'choice_label' => function (Medecin $medecin) {
                    return $medecin->getUtilisateur()? $medecin->getUtilisateur()->getNom() . ' ' . $medecin->getUtilisateur()->getPrenom(). ' ' . $medecin->getSpecialty()->getName(): null;
                },
                'placeholder' => 'Choisir un médecin',
                'required' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sejour::class,
        ]);
    }
}