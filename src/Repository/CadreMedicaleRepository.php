<?php

namespace App\Repository;

use App\Entity\CadreMedicale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CadreMedicale|null find($id, $lockMode = null, $lockVersion = null)
 * @method CadreMedicale|null findOneBy(array $criteria, array $orderBy = null)
 * @method CadreMedicale[]    findAll()
 * @method CadreMedicale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CadreMedicaleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CadreMedicale::class);
    }

    // /**
    //  * @return CadreMedicale[] Returns an array of CadreMedicale objects
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
    public function findOneBySomeField($value): ?CadreMedicale
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findAllCadre()
    {
        $conn = $this->getEntityManager()->getConnection();


        $Sql = 'SELECT c.id as id ,c.nom as nom, c.prenom as prenom,  s.nom as nomService 
         FROM cadre_medicale c, service s, cadre_medicale_service
         where
         c.id=cadre_medicale_service.cadre_medicale_id
            and 
            s.id=cadre_medicale_service.service_id
       
            

         ';
        $stmt = $conn->prepare($Sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }
}
