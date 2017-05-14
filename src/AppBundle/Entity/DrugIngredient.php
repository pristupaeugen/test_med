<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DrugIngredient
 *
 * @ORM\Table(name="drug_ingredients")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DrugIngredientRepository")
 */
class DrugIngredient
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
     * @ORM\Column(type="string", length=255)
     */
    private $strength;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * Many records have One ingredient.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ingredient")
     * @ORM\JoinColumn(name="ingredients_id", referencedColumnName="id")
     */
    private $ingredient;

    /**
     * Many records have One drug.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Drug", inversedBy="drugIngredients")
     * @ORM\JoinColumn(name="drugs_id", referencedColumnName="id")
     */
    private $drug;

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
     * Set strength
     *
     * @param string $strength
     *
     * @return DrugIngredient
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * Get strength
     *
     * @return string
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return DrugIngredient
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set drug
     *
     * @param \AppBundle\Entity\Drug $drug
     *
     * @return DrugIngredient
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
     * @return DrugIngredient
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
}
