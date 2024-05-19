<?php

namespace App\Repository;

use App\Entity\EcoDepot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EcoDepot>
 *
 * @method EcoDepot|null find($id, $lockMode = null, $lockVersion = null)
 * @method EcoDepot|null findOneBy(array $criteria, array $orderBy = null)
 * @method EcoDepot[]    findAll()
 * @method EcoDepot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EcoDepotRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EcoDepot::class);
    }

//    /**
//     * @return EcoDepot[] Returns an array of EcoDepot objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EcoDepot
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
