<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\Farmer;
use App\Service\Serializer\Request_Serializer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class CustomerController extends AbstractController
{

    /**
     * Este metodo é responsável por criar um novo Customer com base no seu tipo
     * @param Request $request
     * @param Request_Serializer $serializer
     * @param UserPasswordHasherInterface $customerPasswordHasher
     * @param EntityManagerInterface $entityManager
     * @return JsonResponse
     */

    #[Route('/create_customer', name: 'create_customer', methods: 'POST')]
    public function create_customer(
        Request                     $request,
        Request_Serializer          $serializer,
        UserPasswordHasherInterface $customerPasswordHasher,
        EntityManagerInterface      $entityManager
    ): JsonResponse
    {
        $customer_serializer = $serializer->deserialize(
            $request->getContent(), Customer::class, 'json'
        );
        $customer = $customer_serializer->setCustomerPassword(
            $customerPasswordHasher->hashPassword(
                $customer_serializer,
                $customer_serializer->getCustomerPassword()
            )
        );
        $customer->setCustomerDtInserted(new \DateTime());
        $entityManager->persist($customer);
        $entityManager->flush();
        if($customer->getCustomerType() === 'farmer'){
            $farmer = new Farmer();
            $farmer->setFarmerId($customer);
            $entityManager->persist($farmer);
            $entityManager->flush();
        }
        $responseContent = $serializer->serialize(data: $customer->hydrateInformation(), format: 'json');
        return new JsonResponse(data: $responseContent, status: Response::HTTP_CREATED, json: true);
    }
}
