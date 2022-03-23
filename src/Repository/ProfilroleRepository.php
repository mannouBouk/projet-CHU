<?php

namespace App\Repository;

use App\Entity\Profilrole;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Profilrole|null find($id, $lockMode = null, $lockVersion = null)
 * @method Profilrole|null findOneBy(array $criteria, array $orderBy = null)
 * @method Profilrole[]    findAll()
 * @method Profilrole[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfilroleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Profilrole::class);
    }

    // /**
    //  * @return Profilrole[] Returns an array of Profilrole objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Profilrole
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
