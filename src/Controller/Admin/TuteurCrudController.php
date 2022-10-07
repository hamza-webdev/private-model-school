<?php

namespace App\Controller\Admin;

use App\Entity\Tuteur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TuteurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tuteur::class;
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
