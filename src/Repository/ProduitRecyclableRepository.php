<?php

namespace App\Repository;

use App\Entity\ProduitRecyclable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProduitRecyclable>
 *
 * @method ProduitRecyclable|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProduitRecyclable|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProduitRecyclable[]    findAll()
 * @method ProduitRecyclable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRecyclableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProduitRecyclable::class);
    }

//    /**
//     * @return ProduitRecyclable[] Returns an array of ProduitRecyclable objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ProduitRecyclable
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
