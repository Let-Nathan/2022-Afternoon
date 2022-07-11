<?php

namespace App\Repository;

use App\Entity\Consultation;
use App\Entity\User;
use App\Form\Sharing\FilterModel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\Types\Collection;

/**
 * @extends ServiceEntityRepository<Consultation>
 *
 * @method Consultation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Consultation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Consultation[]    findAll()
 * @method Consultation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConsultationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Consultation::class);
    }

    public function add(Consultation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Consultation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function statusRefused(): int
    {
        return $this->createQueryBuilder('c')
            ->select('count(c.status)')
            ->where('c.status = :search')
            ->setParameter('search', 'Refused')
            ->getQuery()->getSingleScalarResult();
    }
    public function statusAccepted(): int
    {
        return $this->createQueryBuilder('c')
            ->select('count(c.status)')
            ->where('c.status = :search')
            ->setParameter('search', 'Present')
            ->getQuery()->getSingleScalarResult();
    }
    public function statusJobInteview(): int
    {
        return $this->createQueryBuilder('c')
            ->select('count(c.status)')
            ->where('c.status = :search')
            ->setParameter('search', 'Job interview')
            ->getQuery()->getSingleScalarResult();
    }

//    public function searchBuyer(): array
//    {
//        $qb = $this->createQueryBuilder('c');
//
//        //Filter on buyer
//        if ($filterModel->getBuyer()) {
//            $qb->join('c.user', 'u')
//                ->where('u.firstName LIKE :seller')
//                ->orWhere('u.lastName LIKE :seller')
//                ->setParameter('seller', '%' . $filterModel->getBuyer() . '%');
//        }
//    }

    public function searchWithFilter(FilterModel $filterModel): array
    {
        $qb = $this->createQueryBuilder('c');
//
        //Filter on buyer
        if ($filterModel->getBuyer()) {
            $qb->join('c.user', 'u')
                ->where('u.firstName LIKE :seller')
                ->orWhere('u.lastName LIKE :seller')
                ->setParameter('seller', '%' . $filterModel->getBuyer() . '%');
        }

        //Filter Seller


        //  Filter on candidate name    //
        if ($filterModel->getCandidateName()) {
            $qb->join('c.candidate', 'ca')
                ->andWhere('ca.firstName LIKE :candidate')
                ->orWhere('ca.lastName LIKE :candidate')
                ->setParameter('candidate', '%' . $filterModel->getCandidateName() . '%');
        }
        //  Filter on status choice   //
        if ($filterModel->getStatus()) {
            $qb->andWhere('c.status LIKE :status')
                ->setParameter('status', '%' . $filterModel->getStatus() . '%');
        }
        //  Filter on relance Date  //
        if ($filterModel->getDateRelance()) {
            $qb->andWhere('c.relanceDate LIKE :relanceDate')
                ->setParameter('relanceDate', '%' . $filterModel->getDateRelance()->format('Y-m-d') . '%');
        }
        //  Filter on creation date //
        if ($filterModel->getCreationDate()) {
            $qb->andWhere('c.createdAt LIKE :creationDate')
                ->setParameter('creationDate', '%' . $filterModel->getCreationDate()->format('Y-m-d') . '%');
        }

        return $qb->getQuery()->getResult();
    }

//    /**
//     * @return Consultation[] Returns an array of Consultation objects
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

//    public function findOneBySomeField($value): ?Consultation
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
