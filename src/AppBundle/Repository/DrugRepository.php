<?php

namespace AppBundle\Repository;

/**
 * DrugRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DrugRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Search drugs
     * @param $data is criteria for search
     * @param array $userMedicines is auth user drugs
     * @return array
     */
    public function search($data, $userMedicines = [])
    {
        $userMedicineIds = [];
        foreach ($userMedicines as $medicine) {

            $userMedicineIds[] = $medicine->getId();
        }

        // find all medicines fit to criteria in auth user list of medicines
        $query = $this->createQueryBuilder('p')
            ->where(   'p.name LIKE :name')
            ->andWhere('p.country = :country_id')
            ->andWhere('p.id IN (:id)')
            ->setParameter('name',       '%' . $data['name'] . '%')
            ->setParameter('country_id', $data['country_id'])
            ->setParameter('id',         $userMedicineIds)
            ->getQuery();

        $userMedicinesByCriteria = $query->getResult();
        $results = array_slice($userMedicinesByCriteria, ($data['page'] - 1) * $data['page_size'], $data['page_size']);

        if (count($results) < $data['page_size']) {

            $pagesShift = $data['page'] - 1 - floor(count($userMedicinesByCriteria)/$data['page_size']);
            $rowsShift  = ($pagesShift == 0) ? 0 : (count($userMedicinesByCriteria) % $data['page_size']);

            // find all medicines fit to criteria without auth user list of medicines
            $query = $this->createQueryBuilder('p')
                ->where(   'p.name LIKE :name')
                ->andWhere('p.country = :country_id')
                ->andWhere('p.id NOT IN (:id)')
                ->setParameter('name',       '%' . $data['name'] . '%')
                ->setParameter('country_id', $data['country_id'])
                ->setParameter('id',         !empty($userMedicineIds) ? $userMedicineIds : [0])
                ->setFirstResult(($pagesShift) * $data['page_size'] - $rowsShift)
                ->setMaxResults($data['page_size'] - count($results))
                ->getQuery();

            $medicinesByCriteria = $query->getResult();

            $results = array_merge($results, $medicinesByCriteria);
        }

        return $results;
    }

    /**
     * Find drug with Query Builder by id
     *
     * @param $id
     * @return mixed
     */
    public function findDrugBy($id)
    {
        $qb = $this->createQueryBuilder('p');
        $qb->addSelect('a')
           ->innerJoin('p.drugType', 'a')
           ->where('p.id = :id')
           ->setParameter('id', $id);

        return $qb->getQuery()->getOneOrNullResult();
    }
}