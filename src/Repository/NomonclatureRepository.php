<?php

namespace App\Repository;

use App\Entity\Nomonclature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Nomonclature>
 *
 * @method Nomonclature|null find($id, $lockMode = null, $lockVersion = null)
 * @method Nomonclature|null findOneBy(array $criteria, array $orderBy = null)
 * @method Nomonclature[]    findAll()
 * @method Nomonclature[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NomonclatureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Nomonclature::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Nomonclature $entity, bool $flush = true): void
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
    public function remove(Nomonclature $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Nomonclature[] Returns an array of Nomonclature objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Nomonclature
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findAllNomonclature()
    {
        $conn = $this->getEntityManager()->getConnection();


        $Sql = 'SELECT n.id as id, n.prix as prix, re.type as typeRepa , r.type as typeRegime_al
         FROM nomonclature n,repa re,regime_al r
         where
         n.regime_id=r.id
            and 
            n.repa_id=re.id
        

         ';
        $stmt = $conn->prepare($Sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }


    public function findOneNomonclatureById($id)
    {
        $conn = $this->getEntityManager()->getConnection();


        $Sql = 'SELECT  n.id as id, re.type as repa ,r.type as regime, n.prix as prix
         FROM nomonclature n,repa re,regime_al r
         where
         n.regime_id=r.id
            and 
         n.repa_id=re.id
        and

         n.id=' . $id;

        $stmt = $conn->prepare($Sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAssociative();
    }
}
