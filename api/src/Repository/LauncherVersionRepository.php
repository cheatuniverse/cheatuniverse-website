<?php

namespace App\Repository;

use App\Entity\LauncherVersion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LauncherVersion|null find($id, $lockMode = null, $lockVersion = null)
 * @method LauncherVersion|null findOneBy(array $criteria, array $orderBy = null)
 * @method LauncherVersion[]    findAll()
 * @method LauncherVersion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LauncherVersionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LauncherVersion::class);
    }

    // /**
    //  * @return LauncherVersion[] Returns an array of LauncherVersion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LauncherVersion
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
