<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EventCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Event::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->setRequired(false),
            TextField::new('title'),
            ImageField::new('photo')
            ->setUploadDir('public/images/')
            ->setBasePath('images/')
            ->setRequired(false),
            TextField::new('category'),
            DateField::new('date'),
            TimeField::new('duration'),
            TextEditorField::new('presentation'),
            BooleanField::new('booking_required'),
            BooleanField::new('free'),
            MoneyField::new('price')->setCurrency('EUR'),
            IntegerField::new('max_participants'),
            AssociationField::new('ageGroup'),
            AssociationField::new('venue'),
            AssociationField::new('bookings')
        ];
    }
    
}