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

    public function createNew(): UrlCheck
    {
        return new UrlCheck();
    }
}
