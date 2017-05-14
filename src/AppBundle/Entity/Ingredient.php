<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use JMS\Serializer\Annotation\Exclude;

/**
 * Ingredient
 *
 * @ORM\Table(name="ingredients")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IngredientRepository")
 */
class Ingredient
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
     * @Exclude
     */
    private $summary;

    /**
     * @ORM\Column(type="string", length=16777216)
     * @Exclude
     */
    private $detail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * Many ingredients have One category.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\IngredientCategory")
     * @ORM\JoinColumn(name="ingredient_categories_id", referencedColumnName="id")
     */
    private $ingredientCategory;

    /**
     * @var float
     */
    private $strength;

    /**
     * @var boolean
     */
    private $active;

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
     * Set name
     *
     * @param string $name
     *
     * @return Ingredient
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set summary
     *
     * @param string $summary
     *
     * @return Ingredient
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set detail
     *
     * @param string $detail
     *
     * @return Ingredient
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set ingredientCategory
     *
     * @param \AppBundle\Entity\Drug $ingredientCategory
     *
     * @return Ingredient
     */
    public function setIngredientCategory(\AppBundle\Entity\Drug $ingredientCategory = null)
    {
        $this->ingredientCategory = $ingredientCategory;

        return $this;
    }

    /**
     * Get ingredientCategory
     *
     * @return \AppBundle\Entity\Drug
     */
    public function getIngredientCategory()
    {
        return $this->ingredientCategory;
    }

    /**
     * Set strength
     *
     * @param float $strength
     *
     * @return Ingredient
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * Get strength
     *
     * @return float
     */
    public function getStrength()
    {
        if (is_string($this->strength)) {

            return (float)preg_replace('/[^\d\.]/', '', preg_replace('/\/.+/', '', $this->strength));
        }

        return $this->strength;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Ingredient
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
}
