<?php

namespace AppBundle\Repository;

/**
 * IngredientRepository
 */
class IngredientRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Find ingredient by name
     * @param $name is criteria for method
     * @return array
     */
    public function findByName($name)
    {
        $results = $this->createQueryBuilder('p')
                   ->where('p.name LIKE :name')
                   ->setParameter('name',       '%' . $name . '%')
                   ->getQuery()
                   ->getResult();

        return (count($results) > 0) ? $results[0] : null;
    }
}
