<?php

namespace AppBundle\Repository;

/**
 * DrugIngredientRepository
 */
class DrugIngredientRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Get drug ingredients array by drug ids
     * @param array $drugIds are drug ids
     * @return array of drug ingredients
     */
    public function getDrugIngredientsByDrugIds($drugIds)
    {
        $em = $this->getEntityManager();

        // Find drug ingredients
        $query = $em->createQuery('
                     SELECT IDENTITY(di.drug) AS drug_id,
                            IDENTITY(di.ingredient) AS ingredient_id
                     FROM AppBundle\Entity\DrugIngredient AS di 
                     WHERE di.drug IN (?1)');

        $query->setParameter(1, $drugIds);

        $ingredients = $query->getResult();
        if (empty($ingredients)) {

            return [];
        }

        $drugIngredients = [];
        foreach ($ingredients as $ingredient) {

            if (!isset($drugIngredients[$ingredient['ingredient_id']])) {

                $drugIngredients[$ingredient['ingredient_id']] = [];
            }

            $drugIngredients[$ingredient['ingredient_id']][$ingredient['drug_id']] = $ingredient;
        }

        return $drugIngredients;
    }
}