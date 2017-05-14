<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DrugInteraction
 *
 * @ORM\Table(name="drug_interactions")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DrugInteractionRepository")
 */
class DrugInteraction
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=16777216)
     */
    private $description;

    /**
     * Many records have One ingredient.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ingredient")
     * @ORM\JoinColumn(name="ingredients_id", referencedColumnName="id")
     */
    private $ingredient;

    /**
     * Many records have One drug.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Drug")
     * @ORM\JoinColumn(name="drugs_id", referencedColumnName="id")
     */
    private $drug;

    /**
     * Many records have One iteraction category.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\InteractionCategory")
     * @ORM\JoinColumn(name="interaction_categories_id", referencedColumnName="id")
     */
    private $interactionCategory;

    /**
     * Many records have One iteraction severity.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\InteractionSeverity")
     * @ORM\JoinColumn(name="interaction_severities_id", referencedColumnName="id")
     */
    private $interactionSeverity;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return DrugInteraction
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set drug
     *
     * @param \AppBundle\Entity\Drug $drug
     *
     * @return DrugInteraction
     */
    public function setDrug(\AppBundle\Entity\Drug $drug = null)
    {
        $this->drug = $drug;

        return $this;
    }

    /**
     * Get drug
     *
     * @return \AppBundle\Entity\Drug
     */
    public function getDrug()
    {
        return $this->drug;
    }

    /**
     * Set ingredient
     *
     * @param \AppBundle\Entity\Ingredient $ingredient
     *
     * @return DrugInteraction
     */
    public function setIngredient(\AppBundle\Entity\Ingredient $ingredient = null)
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    /**
     * Get ingredient
     *
     * @return \AppBundle\Entity\Ingredient
     */
    public function getIngredient()
    {
        return $this->ingredient;
    }

    /**
     * Set interactionCategory
     *
     * @param \AppBundle\Entity\InteractionCategory $interactionCategory
     *
     * @return DrugInteraction
     */
    public function setInteractionCategory(\AppBundle\Entity\InteractionCategory $interactionCategory = null)
    {
        $this->interactionCategory = $interactionCategory;

        return $this;
    }

    /**
     * Get interactionCategory
     *
     * @return \AppBundle\Entity\InteractionCategory
     */
    public function getInteractionCategory()
    {
        return $this->interactionCategory;
    }

    /**
     * Set interactionSeverity
     *
     * @param \AppBundle\Entity\InteractionSeverity $interactionSeverity
     *
     * @return DrugInteraction
     */
    public function setInteractionSeverity(\AppBundle\Entity\InteractionSeverity $interactionSeverity = null)
    {
        $this->interactionSeverity = $interactionSeverity;

        return $this;
    }

    /**
     * Get interactionSeverity
     *
     * @return \AppBundle\Entity\InteractionSeverity
     */
    public function getInteractionSeverity()
    {
        return $this->interactionSeverity;
    }
}
