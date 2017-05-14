<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MedicineIngredient
 *
 * @ORM\Table(name="omh_medicine_ingredient",uniqueConstraints={@ORM\UniqueConstraint(name="medicine_ingredient_id", columns={"medicine_id", "ingredient_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MedicineIngredientRepository")
 *
 * @package V0
 */
class MedicineIngredient
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
     * Many records have One medicine.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Medicine", inversedBy="medicineIngredients")
     * @ORM\JoinColumn(name="medicine_id", referencedColumnName="id")
     */
    private $medicine;

    /**
     * Many records have One ingredient.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\IngredientV0", inversedBy="medicines")
     * @ORM\JoinColumn(name="ingredient_id", referencedColumnName="id")
     */
    private $ingredient;

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
     * Set medicine
     *
     * @param \AppBundle\Entity\Medicine $medicine
     *
     * @return MedicineIngredient
     */
    public function setMedicine(\AppBundle\Entity\Medicine $medicine = null)
    {
        $this->medicine = $medicine;

        return $this;
    }

    /**
     * Get medicine
     *
     * @return \AppBundle\Entity\Medicine
     */
    public function getMedicine()
    {
        return $this->medicine;
    }

    /**
     * Set ingredient
     *
     * @param \AppBundle\Entity\IngredientV0 $ingredient
     *
     * @return MedicineIngredient
     */
    public function setIngredient(\AppBundle\Entity\IngredientV0 $ingredient = null)
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    /**
     * Get ingredient
     *
     * @return \AppBundle\Entity\IngredientV0
     */
    public function getIngredient()
    {
        return $this->ingredient;
    }
}
