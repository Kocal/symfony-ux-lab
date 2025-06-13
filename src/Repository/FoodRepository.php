<?php

namespace App\Repository;

use App\Entity\Food;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Food>
 */
class FoodRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Food::class);
    }

    public function hasResults(): bool
    {
        $qb = $this->createQueryBuilder('f')
            ->select('COUNT(f.id) AS count');

        return $qb->getQuery()->getSingleScalarResult() > 0;
    }

    public function initFixtures(): void
    {
        $em = $this->getEntityManager();
        $foods = [
            new Food('Apple'),
            new Food('Banana'),
            new Food('Carrot'),
            new Food('Doughnut'),
            new Food('Eggplant'),
            new Food('Fig'),
            new Food('Grapes'),
            new Food('Honeydew'),
            new Food('Iceberg Lettuce'),
            new Food('Jackfruit')
        ];

        foreach ($foods as $food) {
            $em->persist($food);
        }

        $em->flush();
    }
}
