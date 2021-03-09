<?php

namespace App\Repository;

use App\Entity\CustomerNotation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CustomerNotation|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomerNotation|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomerNotation[]    findAll()
 * @method CustomerNotation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerNotationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CustomerNotation::class);
    }

    // /**
    //  * @return CustomerNotation[] Returns an array of CustomerNotation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CustomerNotation
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
