<?php

namespace App\Repository;

use App\Entity\Plato;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Plato|null find($id, $lockMode = null, $lockVersion = null)
 * @method Plato|null findOneBy(array $criteria, array $orderBy = null)
 * @method Plato[]    findAll()
 * @method Plato[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlatoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Plato::class);
    }

    // /**
    //  * @return Plato[] Returns an array of Plato objects
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
    public function findOneBySomeField($value): ?Plato
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
