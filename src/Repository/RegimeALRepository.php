<?php

namespace App\Repository;

use App\Entity\RegimeAL;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RegimeAL|null find($id, $lockMode = null, $lockVersion = null)
 * @method RegimeAL|null findOneBy(array $criteria, array $orderBy = null)
 * @method RegimeAL[]    findAll()
 * @method RegimeAL[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegimeALRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RegimeAL::class);
    }

    // /**
    //  * @return RegimeAL[] Returns an array of RegimeAL objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RegimeAL
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
