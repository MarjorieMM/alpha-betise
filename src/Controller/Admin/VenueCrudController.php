<?php

namespace App\Controller\Admin;

use App\Entity\Venue;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VenueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Venue::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->setRequired(false),
            TextField::new('name'),
            TextField::new('address'),
            TextField::new('postal_code'),
            TextField::new('city'),
        ];
    }
 
}