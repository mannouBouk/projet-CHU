<?php

namespace App\Repository;

use App\Classe\Toteaux;
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
    public function findAllPatientInRegime($id)
    {
        $conn = $this->getEntityManager()->getConnection();


        $Sql = 'SELECT p.id as id, p.prenom as prenom, p.nom as nom, r.type as typeRegime_al
            
         FROM Patient p, regime_al r, patient_regime_al pr
            where
            r.id=pr.regime_al_id
           AND
            
            p.id=pr.patient_id
            
            and
            r.id=' . $id;
        $stmt = $conn->prepare($Sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }


    public function findOneByTotale($id)
    {
        $conn = $this->getEntityManager()->getConnection();
        $Sql = 'SELECT COUNT(*) AS totale FROM patient p,regime_al r,patient_regime_al pr
        where
        r.id=pr.regime_al_id
               AND
                
                p.id=pr.patient_id
                AND
        r.id=' . $id;
        $stmt = $conn->prepare($Sql);
        $resultSet = $stmt->executeQuery();
        return $resultSet->fetchOne();
    }
}
