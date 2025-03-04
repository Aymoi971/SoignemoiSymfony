<?php

namespace App\Form;

use App\Entity\Medecin;
use App\Entity\Specialty;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedecinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Matricule')
            ->add('Utilisateur', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ])
            ->add('specialty', EntityType::class, [
                'class' => Specialty::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Medecin::class,
        ]);
    }
}
