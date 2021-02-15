<?php

namespace App\Controller;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Entity\Customer;
use App\Repository\CustomerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;

class ApiCustomerController extends AbstractController
{
      /**
     * @Route("/api/customers", name="api_customers", methods={"GET"})
     */
    
    public function index(CustomerRepository $customerRepository ): Response
    {
        return $this->json($customerRepository->findAll(), 200, [], ['groups' => 'customers']);
    }

      /**
     * @Route("/api/customers/new", name="api_customers_new", methods={"POST"})
     */

    public function newcustomer(Request $request, SerializerInterface $serializer, EntityManagerInterface $manager, ValidatorInterface $valid): Response
    {
        $data = $request->getContent();
        
        try {
            
            $customer = $serializer->deserialize($data, Customer::class, 'json');

            $errors = $valid->validate($customer);

            if(count($errors) >0 ){
                return $this->Json($errors, 400);
            }

            $manager->persist($customer);
            $manager->flush();
    
            return $this->json($customer, 201, [], ['groups' => 'customers']);
        } catch(NotEncodableValueException $e) {
            return $this->json(['status' => 400, 'message' => $e->getMessage()], 400);
        }
       
        
    }
}