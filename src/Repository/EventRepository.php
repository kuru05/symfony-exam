<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Event>
 *
 * @method Event|null find($id, $lockMode = null, $lockVersion = null)
 * @method Event|null findOneBy(array $criteria, array $orderBy = null)
 * @method Event[]    findAll()
 * @method Event[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }
    public function findWithSearch(?string $query, ?\App\Entity\Category $category, ?string $city): array
    {
        $qb = $this->createQueryBuilder('e')
            ->leftJoin('e.category', 'c')
            ->addSelect('c')
            ->leftJoin('e.creator', 'u')
            ->addSelect('u')
            ->orderBy('e.date', 'ASC');

        if ($query) {
            $qb->andWhere('e.title LIKE :query OR e.description LIKE :query')
               ->setParameter('query', '%' . $query . '%');
        }

        if ($category) {
            $qb->andWhere('e.category = :category')
               ->setParameter('category', $category);
        }

        if ($city) {
            $qb->andWhere('e.location = :city')
               ->setParameter('city', $city);
        }

        return $qb->getQuery()->getResult();
    }

    public function findAllCities(): array
    {
        $rows = $this->createQueryBuilder('e')
            ->select('DISTINCT e.location')
            ->orderBy('e.location', 'ASC')
            ->getQuery()
            ->getResult();

        return array_map(fn($row) => $row['location'], $rows);
    }
}
