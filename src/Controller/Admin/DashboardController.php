<?php

namespace App\Controller\Admin;

use App\Entity\Book;
use App\Entity\Event;
use App\Entity\Venue;
use App\Entity\Author;
use App\Entity\Booking;
use App\Entity\AgeGroup;
use App\Entity\Customer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Alpha Betise');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Livres', 'fa fa-tags', Book::class);
        yield MenuItem::linkToCrud('Auteurs', 'fa fa-tags', Author::class);
        yield MenuItem::linkToCrud('Listing clients', 'fa fa-tags', Customer::class);
        yield MenuItem::linkToCrud('Lieux des évènements', 'fa fa-tags', Venue::class);
        yield MenuItem::linkToCrud('groupes d\'âges', 'fa fa-tags', AgeGroup::class);
        yield MenuItem::linkToCrud('Events', 'fa fa-tags', Event::class);
        yield MenuItem::linkToCrud('Booking', 'fa fa-tags', Booking::class);
        yield MenuItem::linkToCrud('Customers', 'fa fa-tags', Customer::class);
        
     
    }
}