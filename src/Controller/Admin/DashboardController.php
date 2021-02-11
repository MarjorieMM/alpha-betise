<?php

namespace App\Controller\Admin;

use App\Entity\Book;
use App\Entity\Venue;
use App\Entity\Author;
use App\Entity\Customer;
use App\Entity\BookPhoto;
use App\Entity\Event;
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
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Books', 'fa fa-tags', Book::class);
        yield MenuItem::linkToCrud('BookPhotos', 'fa fa-tags', BookPhoto::class);
        yield MenuItem::linkToCrud('Authors', 'fa fa-tags', Author::class);
        yield MenuItem::linkToCrud('Customers', 'fa fa-tags', Customer::class);
        yield MenuItem::linkToCrud('Venues', 'fa fa-tags', Venue::class);
        yield MenuItem::linkToCrud('Events', 'fa fa-tags', Event::class);
        
     
    }
}