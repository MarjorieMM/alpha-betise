<?php

namespace App\Controller\Admin;

use App\Entity\AgeGroup;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class AgeGroupCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AgeGroup::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('category'),
            IntegerField::new('min_age'),
            IntegerField::new('max_age'),
        ];
    }
    
}