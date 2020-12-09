<?php

namespace App\Repository;

use App\Entity\TownHall;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TownHall|null find($id, $lockMode = null, $lockVersion = null)
 * @method TownHall|null findOneBy(array $criteria, array $orderBy = null)
 * @method TownHall[]    findAll()
 * @method TownHall[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TownHallRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TownHall::class);
    }

    public function findFirstId()
    {
        return $this->createQueryBuilder('t')
                    ->select('t.id')
                    ->orderBy('t.id', 'ASC')
                    ->setMaxResults(1)
                    ->getQuery()
                    ->getResult()
                    ;
    }

    // /**
    //  * @return TownHall[] Returns an array of TownHall objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TownHall
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}