<?php

namespace App\Repository;

use App\Entity\RepasServis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RepasServis>
 *
 * @method RepasServis|null find($id, $lockMode = null, $lockVersion = null)
 * @method RepasServis|null findOneBy(array $criteria, array $orderBy = null)
 * @method RepasServis[]    findAll()
 * @method RepasServis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepasServisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RepasServis::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(RepasServis $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(RepasServis $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return RepasServis[] Returns an array of RepasServis objects
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
    public function findOneBySomeField($value): ?RepasServis
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findAllPatientServis()
    {
        $conn = $this->getEntityManager()->getConnection();


        $Sql = 'SELECT * FROM patient';
        $stmt = $conn->prepare($Sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }
}
