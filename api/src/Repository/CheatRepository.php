<?php

namespace App\Repository;

use App\Entity\Cheat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cheat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cheat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cheat[]    findAll()
 * @method Cheat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CheatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cheat::class);
    }

    // /**
    //  * @return Cheat[] Returns an array of Cheat objects
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
    public function findOneBySomeField($value): ?Cheat
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
