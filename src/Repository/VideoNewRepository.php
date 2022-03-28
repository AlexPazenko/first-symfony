<?php

namespace App\Repository;

use App\Entity\VideoNew;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VideoNew|null find($id, $lockMode = null, $lockVersion = null)
 * @method VideoNew|null findOneBy(array $criteria, array $orderBy = null)
 * @method VideoNew[]    findAll()
 * @method VideoNew[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoNewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VideoNew::class);
    }

    // /**
    //  * @return VideoNew[] Returns an array of VideoNew objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VideoNew
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
