<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiBooksController extends AbstractController
{
    /**
     * @Route("/api/books", name="api_books", methods={"GET"})
     */
    
    public function index(BookRepository $bookRepository ): Response
    {
//fonction détaillée pour la récupération et serialisation des données "book"
        // $books = $bookRepository->findAll();
        // $json = $serializer->serialize($books,'json', ['groups' => 'books']);
        // return new JsonResponse($json, 200, [], true);

    return $this->json($bookRepository->findAll(), 200, [], ['groups' => 'books']);
}
}