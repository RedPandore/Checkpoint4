<?php

namespace App\Controller\Admin;

use App\Entity\Projet;
use App\Field\VichImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProjetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Projet::class;
    }


    public function configureFields(string $pageName): iterable
    {

        yield TextField::new('name');
        yield TextField::new('url');
        yield TextareaField::new('language');
        yield TextareaField::new('description');
        yield VichImageField::new('image')->hideOnForm();
        yield VichImageField::new('imageFile')->onlyOnForms();
   
    }
    
}
