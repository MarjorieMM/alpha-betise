<?php

namespace App\Controller\Admin;

use App\Entity\Author;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AuthorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Author::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->setRequired(false),
            TextField::new('firstname'),
            TextField::new('lastname'),
            AssociationField::new('books')
            ->formatValue(function ($value, $entity) {
                $str = $entity->getBooks()[0];
                for ($i = 1; $i < $entity->getBooks()->count(); $i++) {
                    $str = $str . ", " . $entity->getBooks()[$i];
                }
                return $str;
              }),
        ];
    }
    
}