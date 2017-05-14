<?php

namespace AppBundle\Repository;

/**
 * DrugLabelRepository
 */
class DrugLabelRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Get labels by drug
     *
     * @param int $drugId is drug id
     * @return array of labels
     */
    public function getLabelsByDrug($drugId)
    {
        return $this->findBy(['drug' => $drugId]);
    }
}
