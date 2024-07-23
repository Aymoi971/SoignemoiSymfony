<?php

namespace App\Controller\SuperAdmin;

use App\Entity\Medecin;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MedecinCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Medecin::class;
    }

    public function configureCrud(Crud $crud): Crud{
        $crud->setEntityLabelInSingular('Medecin');
        $crud->setEntityLabelInPlural('Medecins');
        $crud->setSearchFields(['Matricule', 'Utilisateur','Specialty']);
        $crud->setDefaultSort(['Specialty' => 'ASC']);
        return $crud;
    }
    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('User'))
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('Matricule');
        yield AssociationField::new('Utilisateur');
        yield TextField::new('Specialty');
        
        // return [
        //     IdField::new('id'),
        //     TextField::new('title'),
        //     TextEditorField::new('description'),
        // ];
    }
}
