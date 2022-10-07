<?php

namespace App\Controller\Teacher;

use App\Entity\Specialization;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SpecializationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Specialization::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
