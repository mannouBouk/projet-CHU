<?php

namespace App\Repository;

use App\Entity\Patient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Patient|null find($id, $lockMode = null, $lockVersion = null)
 * @method Patient|null findOneBy(array $criteria, array $orderBy = null)
 * @method Patient[]    findAll()
 * @method Patient[]    findAllPatientWithServicesNames()
 * @method Patient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Patient::class);
    }

    // /**
    //  * @return Patient[] Returns an array of Patient objects
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
    public function findOneBySomeField($value): ?Patient
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    // /**
    //  * @return Patient[] Returns an array of Patient objects
    //  */


    public function findAllPatient()
    {
        $conn = $this->getEntityManager()->getConnection();


        $Sql = 'SELECT p.id as id, p.prenom as prenom, p.regime as regime, p.nom as nom, 
        p.date_Entree as dateEntree, p.date_Sortie as dateSortie, s.nom as nomService , r.type as typeRegime_al
         FROM patient p, service s, patient_service,regime_al r, patient_regime_al pr
         where
         s.id=patient_service.service_id
            and 
            p.id=patient_service.patient_id
        and
        r.id=pr.regime_al_id
           AND
            
            p.id=pr.patient_id
            

         ';
        $stmt = $conn->prepare($Sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }
}
