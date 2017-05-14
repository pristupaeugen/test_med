<?php

namespace AppBundle\Repository;

use Doctrine\ORM\Query;

/**
 * DrugMatchRepository
 */
class DrugMatchRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Search drug match
     * @param $data is criteria for search
     * @return array
     */
    public function search($data)
    {
        $drug = $this->getEntityManager()->getRepository('AppBundle:Drug')->find($data['id']);
        if (empty($drug)) {

            return null;
        }

        // find all matches fit to criteria
        $qb = $this->createQueryBuilder('p');
        $qb->where('p.matchCode = :matchCode')
           ->andWhere('p.country = :countryId');

        if (!empty($data['manufacturer_id'])) {

            $qb->andWhere('p.manufacturer = :manufacturerId');
        }

        $qb->setParameter('matchCode', $drug->getMatchCode())
           ->setParameter('countryId', $data['country_id']);

        if (!empty($data['manufacturer_id'])) {

            $qb->setParameter('manufacturerId', $data['manufacturer_id']);
        }

        if (!empty($data['page_size']) && !empty($data['page'])) {

            $qb->setFirstResult(($data['page'] -1) * $data['page_size']);
            $qb->setMaxResults($data['page_size']);
        }

        $matches = $qb->getQuery()->getResult();
        foreach ($matches as $match) {

            $match->calculateMatchFor($drug);
        }

        return $matches;
    }

    /**
     * Get matches counts by countries
     * @param $matchCode
     * @return array
     */
    public function getMatchesCountsByCountries($matchCode)
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT c.id as country_id, COUNT(c.id) as country_count
                           FROM AppBundle\Entity\DrugMatch dm
                           JOIN dm.country as c
                           WHERE dm.matchCode = ?1 
                           GROUP BY c.id');
        $query->setParameter(1, $matchCode);

        $counts = $query->getResult();

        return empty($counts) ? [] : $counts;
    }
}
