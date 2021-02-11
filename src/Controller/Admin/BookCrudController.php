<?php

namespace App\Controller\Admin;

use App\Entity\Book;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BookCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Book::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->setRequired(false),
            TextField::new('title'),
            TextEditorField::new('extract'),
            AssociationField::new('photo')->formatValue(function ($value, $entity) {
                $str = $entity->getphoto()[0];
                for ($i = 1; $i < $entity->getphoto()->count(); $i++) {
                    $str = $str . ", " . $entity->getphoto()[$i];
                }
                return $str;
              }),
            TextField::new('editor'),
            TextField::new('publishing_house'),
            DateField::new('publication_date'),
            TextField::new('collection'),
            TextField::new('EAN_code'),
            TextField::new('ISBN_code'),
            IntegerField::new('number_pages'),
            IntegerField::new('dimension_h'),
            IntegerField::new('dimension_w'),
            IntegerField::new('weight'),
            TextField::new('language'),
            TextField::new('original_language'),
            AssociationField::new('availability'),
            IntegerField::new('stock'),
            MoneyField::new('price')->setCurrency('EUR'),
            AssociationField::new('age_group'),
            // AssociationField::new('adminComments'),
            // TextField::new('admin_notation'),
            // AssociationField::new('customerOrderBooks'),
            AssociationField::new('authors')->formatValue(function ($value, $entity) {
                $str = $entity->getAuthors()[0];
                for ($i = 1; $i < $entity->getAuthors()->count(); $i++) {
                    $str = $str . ", " . $entity->getAuthors()[$i];
                }
                return $str;
              }),

        ];
    }

    
}