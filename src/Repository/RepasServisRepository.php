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
    
    public function findById($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.id = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    


    public function findOneByPatient($patient_id)
    {

        $conn = $this->getEntityManager()->getConnection();

        $Sql = "SELECT *
                FROM  `repas_servis`
                WHERE `patient_id` = '". $patient_id."' ;";
        $stmt = $conn->prepare($Sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function findAllPatientServis()
    {
        $conn = $this->getEntityManager()->getConnection();


        $Sql = "SELECT `patient`.* , `regime_al`.`type` AS 'regime', `service`.`nom` AS 'service' , `repas_servis`.`date_heure` AS 'date_Servi', `repas_servis`.`servis` FROM `patient`, `patient_regime_al`, `regime_al`, `patient_service`, `service`, `repas_servis` WHERE `patient_regime_al`.`patient_id` = `patient`.`id` AND `patient_regime_al`.`regime_al_id` = `regime_al`.`id` AND `patient_service`.`patient_id` = `patient`.`id` AND `patient_service`.`service_id` = `service`.`id` AND `patient`.`id` = `repas_servis`.`patient_id`;";
        $stmt = $conn->prepare($Sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function findAllRepasServis()
    {

        $conn = $this->getEntityManager()->getConnection();

        $Sql = "SELECT `patient`.* , `regime_al`.`type` AS 'regime', `service`.`nom` AS 'service' , `repas_servis`.`date_heure` AS 'date_Servi' 
                FROM `patient`, `patient_regime_al`, `regime_al`, `patient_service`, `service`, `repas_servis`
                WHERE `patient_regime_al`.`patient_id` = `patient`.`id` 
                AND `patient_regime_al`.`regime_al_id` = `regime_al`.`id` 
                AND `patient_service`.`patient_id` = `patient`.`id` 
                AND `patient_service`.`service_id` = `service`.`id`
                AND `patient`.`id`  = `repas_servis`.`patient_id`
                AND `repas_servis`.`servis` = '1';";
        $stmt = $conn->prepare($Sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function insertServisPatient($patient_id)
    {

        $conn = $this->getEntityManager()->getConnection();

        $sql = "INSERT INTO `repas_servis`(`date_heure`, `patient_id`, `servis`) VALUES (NOW(),'" . $patient_id . "',b'1');";
        $conn->prepare($sql);
        if ($conn->prepare($sql))
            $status = 1;
        else
            $status = 0;

        return $status;

    }
}
