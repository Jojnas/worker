<?php

namespace App\Repository;

use App\Entity\UrlCheck;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UrlCheck|null find($id, $lockMode = null, $lockVersion = null)
 * @method UrlCheck|null findOneBy(array $criteria, array $orderBy = null)
 * @method UrlCheck[]    findAll()
 * @method UrlCheck[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UrlCheckRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UrlCheck::class);
    }

    // /**
    //  * @return UrlCheck[] Returns an array of UrlCheck objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UrlCheck
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
