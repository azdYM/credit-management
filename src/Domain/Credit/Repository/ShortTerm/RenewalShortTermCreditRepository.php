<?php

namespace App\Domain\Credit\Repository\ShortTerm;

use Doctrine\Persistence\ManagerRegistry;
use App\Infrastructure\Orm\AbstractRepository;
use App\Domain\Credit\Entity\ShortTerm\RenewalShortTermCredit;

/**
 * @extends AbstractRepository<RenewalShortTermCredit>
 *
 * @method RenewalShortTermCredit|null find($id, $lockMode = null, $lockVersion = null)
 * @method RenewalShortTermCredit|null findOneBy(array $criteria, array $orderBy = null)
 * @method RenewalShortTermCredit[]    findAll()
 * @method RenewalShortTermCredit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RenewalShortTermCreditRepository extends AbstractRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RenewalShortTermCredit::class);
    }

//    /**
//     * @return RenewalShortTermCredit[] Returns an array of RenewalShortTermCredit objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RenewalShortTermCredit
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
