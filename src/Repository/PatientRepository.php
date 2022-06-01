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

    
    public function findOneByIdRegime($id)
    {
        $conn = $this->getEntityManager()->getConnection();


        $Sql = "SELECT `patient`.* , `regime_al`.`type` AS 'regime', `service`.`nom` AS 'service' , `repas_servis`.`date_heure` AS 'date_Servi' 
                FROM `patient`, `patient_regime_al`, `regime_al`, `patient_service`, `service`, `repas_servis`
                WHERE `patient_regime_al`.`patient_id` = `patient`.`id` 
                AND `patient_regime_al`.`regime_al_id` = `regime_al`.`id` 
                AND `patient_service`.`patient_id` = `patient`.`id` 
                AND `patient_service`.`service_id` = `service`.`id`
                AND `patient`.`id` = '".$id."';";
        $stmt = $conn->prepare($Sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    // /**
    //  * @return Patient[] Returns an array of Patient objects
    //  */


    public function findAllPatient()
    {
        $conn = $this->getEntityManager()->getConnection();


        $Sql = "SELECT `patient`.* , `regime_al`.`type` AS 'regime', `service`.`nom` AS 'service' , `repas_servis`.`date_heure` AS 'date_Servi' 
                FROM `patient`, `patient_regime_al`, `regime_al`, `patient_service`, `service`, `repas_servis`
                WHERE `patient_regime_al`.`patient_id` = `patient`.`id` 
                AND `patient_regime_al`.`regime_al_id` = `regime_al`.`id` 
                AND `patient_service`.`patient_id` = `patient`.`id` 
                AND `patient_service`.`service_id` = `service`.`id`;";
        $stmt = $conn->prepare($Sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }
}
