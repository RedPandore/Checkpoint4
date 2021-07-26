<?php

namespace App\Controller\Admin;

use App\Entity\Information;
use App\Field\VichImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class InformationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Information::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextEditorField::new('description');
        yield VichImageField::new('curriculum')->hideOnForm();
        yield VichImageField::new('curriculumFile')->onlyOnForms();
    }
    
}
