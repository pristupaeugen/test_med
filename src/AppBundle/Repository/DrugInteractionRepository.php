<?php

namespace AppBundle\Repository;

use  AppBundle\Entity\InteractionSeverity;

/**
 * DrugInteractionRepository
 */
class DrugInteractionRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Find interactions by drug ids
     * @param $data is criteria for interaction search
     * @return array
     */
    public function findInteractions($data)
    {
        $drugsArr = $this->getEntityManager()->getRepository('AppBundle:Drug')->findBy(['id' => $data]);
        if (count($drugsArr) == 0) {

            return [];
        }

        if (count($drugsArr) == 1) {

            $singleDrug = current($drugsArr);
            return [
                [
                    'drug'            => $singleDrug,
                    'maxSeverity'     => $this->getEntityManager()->getRepository('AppBundle:InteractionSeverity')->find(InteractionSeverity::NO_INTERACTION_ID),
                    'drugsInteracted' => []]
            ];
        }

        $drugs = [];
        foreach ($drugsArr as $drug) {

            $drugs[$drug->getId()] = $drug;
        }

        $pairs = $this->_preparePairs($data);

        $pairInteractions = [];
        foreach ($pairs as $pair) {

            $pairInteractions[] = [
                'drug'           => $drugs[$pair[0]],
                'drugInteracted' => $drugs[$pair[1]],
                'severity'       => $this->getMaxSeverity($pair[0], $pair[1])
            ];

            $pairInteractions[] = [
                'drug'           => $drugs[$pair[1]],
                'drugInteracted' => $drugs[$pair[0]],
                'severity'       => $this->getMaxSeverity($pair[1], $pair[0])
            ];
        }

        $drugInteractions = $this->getInteractionsByDrugIds(array_keys($drugs));

        $interactions = [];
        foreach ($pairInteractions as $pairInteraction) {

            $thisDrugId = $pairInteraction['drug']->getId();
            if (!isset($interactions[$thisDrugId])) {

                $interactions[$thisDrugId] = [
                    'drug'            => $pairInteraction['drug'],
                    'maxSeverity'     => $pairInteraction['severity'],
                    'drugsInteracted' => []
                ];
            }

            if ($pairInteraction['severity']->getId() != InteractionSeverity::NO_INTERACTION_ID) {

                $ingredientInteractions = [];
                if (isset($drugInteractions[$thisDrugId]) && isset($drugInteractions[$thisDrugId][$pairInteraction['drugInteracted']->getId()])) {

                    $ingredientInteractions = $drugInteractions[$thisDrugId][$pairInteraction['drugInteracted']->getId()];
                }

                $interactions[$thisDrugId]['drugsInteracted'][] = [
                    'drugId'                 => $pairInteraction['drugInteracted']->getId(),
                    'maxSeverity'            => $pairInteraction['severity'],
                    'ingredientInteractions' => $ingredientInteractions
                ];
            }

            if ($interactions[$thisDrugId]['maxSeverity']->getId() > $pairInteraction['severity']->getId()) {

                $interactions[$thisDrugId]['maxSeverity'] = $pairInteraction['severity'];
            }
        }

        return array_values($interactions);
    }

    /**
     * Get interactions by drug ids
     * @param array $drugIds is drug ids
     * @return array of interactions
     */
    public function getInteractionsByDrugIds($drugIds)
    {
        $em = $this->getEntityManager();

        // Find drug ingredients
        $drugIngredients = $em->getRepository('AppBundle:DrugIngredient')->getDrugIngredientsByDrugIds($drugIds);

        // Find drug interactions
        $query = $em->createQuery('
                     SELECT IDENTITY(di.drug) AS drug_id,
                            IDENTITY(di.ingredient) AS ingredient_id, 
                            di.description AS description,
                            ise.id AS severity_id,
                            ise.description AS severity_description
                     FROM AppBundle\Entity\DrugInteraction AS di
                     JOIN di.interactionSeverity AS ise 
                     WHERE di.drug IN (?1) AND di.ingredient IN (SELECT IDENTITY(din.ingredient)
                                                                 FROM AppBundle\Entity\DrugIngredient AS din
                                                                 WHERE din.drug IN (?2))');

        $query->setParameter(1, $drugIds);
        $query->setParameter(2, $drugIds);

        $interactions = $query->getResult();
        if (empty($interactions)) {

            return [];
        }

        $drugInteractions = [];
        foreach ($interactions as $interaction) {

            $thisDrugId = $interaction['drug_id'];

            if (!isset($drugInteractions[$thisDrugId])) {

                $drugInteractions[$thisDrugId] = [];
            }

            $thisIngredientId = $interaction['ingredient_id'];
            if (isset($drugIngredients[$thisIngredientId])) {

                foreach ($drugIngredients[$thisIngredientId] as $drugId => $ingredient) {

                    if ($thisDrugId != $drugId) {

                        if (!isset($drugInteractions[$thisDrugId][$drugId])) {

                            $drugInteractions[$thisDrugId][$drugId] = [];
                        }

                        $drugInteractions[$thisDrugId][$drugId][] = [

                            'ingredientId' => (int)$thisIngredientId,
                            'description'  => $interaction['description'],
                            'severity'     => ['id' => $interaction['severity_id'], 'description' => $interaction['severity_description']]
                        ];
                    }
                }
            }
        }

        return $drugInteractions;
    }

    /**
     * Get max severity for drug and compared drug
     *
     * @param int $drugId is drug id of base drug
     * @param int $interactedDrugId is drug id of compared drug
     * @return \AppBundle\Entity\InteractionSeverity|null|object
     */
    public function getMaxSeverity($drugId, $interactedDrugId)
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery('
                     SELECT MIN(di.interactionSeverity) as severity_id
                     FROM AppBundle\Entity\DrugInteraction AS di
                     WHERE di.drug = ?1 AND di.ingredient IN (SELECT IDENTITY(din.ingredient)
                                                              FROM AppBundle\Entity\DrugIngredient AS din
                                                              WHERE din.drug = ?2)
                     GROUP BY di.drug');

        $query->setParameter(1, $drugId);
        $query->setParameter(2, $interactedDrugId);

        $res = $query->getResult();

        return empty($res)
            ? $em->getRepository('AppBundle:InteractionSeverity')->find(InteractionSeverity::NO_INTERACTION_ID)
            : $em->getRepository('AppBundle:InteractionSeverity')->find(current($res)['severity_id']);
    }

    /**
     * Prepare pairs from simple array
     * @param array $arr
     * @return array
     */
    protected function _preparePairs($arr)
    {
        if (count($arr) == 2) {

            return [$arr];
        }

        function preparePairs($arr, $el = null) {

            $arrSize = 2;

            $arrPairs = (count($arr) > $arrSize) ? preparePairs(array_slice($arr, 1), current($arr)) : [$arr];

            $newArr = [];
            foreach ($arrPairs as $pair) {

                $newArr[] = [$pair[0], $el];
                $newArr[] = [$pair[1], $el];
            }

            return array_merge($newArr, $arrPairs);
        };

        $pairs = preparePairs(array_slice($arr, 1), current($arr));

        $uniquePairs = [];
        foreach ($pairs as $pair) {

            if (!in_array($pair, $uniquePairs)) {

                $uniquePairs[] = $pair;
            }
        }

        return $uniquePairs;
    }
}
