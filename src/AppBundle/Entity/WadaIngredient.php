<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WadaIngredient
 *
 * @ORM\Table(name="wada_ingredients")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WadaIngredientRepository")
 */
class WadaIngredient
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
    private $class;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, name="prohibited_in")
     */
    private $prohibitedIn;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sport;

    /**
     * @ORM\Column(type="string", length=255, name="top_level_category")
     */
    private $topLevelCategory;

    /**
     * @ORM\Column(type="string", length=255, name="category_level1")
     */
    private $categoryLevel1;

    /**
     * @ORM\Column(type="string", length=255, name="category_level2")
     */
    private $categoryLevel2;

    /**
     * @ORM\Column(type="string", length=255, name="category_level3")
     */
    private $categoryLevel3;

    /**
     * Many records have One ingredient.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ingredient")
     * @ORM\JoinColumn(name="ingredients_id", referencedColumnName="id")
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
     * Set class
     *
     * @param string $class
     *
     * @return WadaIngredient
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return WadaIngredient
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
     * Set prohibitedIn
     *
     * @param string $prohibitedIn
     *
     * @return WadaIngredient
     */
    public function setProhibitedIn($prohibitedIn)
    {
        $this->prohibitedIn = $prohibitedIn;

        return $this;
    }

    /**
     * Get prohibitedIn
     *
     * @return string
     */
    public function getProhibitedIn()
    {
        return $this->prohibitedIn;
    }

    /**
     * Set sport
     *
     * @param string $sport
     *
     * @return WadaIngredient
     */
    public function setSport($sport)
    {
        $this->sport = $sport;

        return $this;
    }

    /**
     * Get sport
     *
     * @return string
     */
    public function getSport()
    {
        return $this->sport;
    }

    /**
     * Set topLevelCategory
     *
     * @param string $topLevelCategory
     *
     * @return WadaIngredient
     */
    public function setTopLevelCategory($topLevelCategory)
    {
        $this->topLevelCategory = $topLevelCategory;

        return $this;
    }

    /**
     * Get topLevelCategory
     *
     * @return string
     */
    public function getTopLevelCategory()
    {
        return $this->topLevelCategory;
    }

    /**
     * Set categoryLevel1
     *
     * @param string $categoryLevel1
     *
     * @return WadaIngredient
     */
    public function setCategoryLevel1($categoryLevel1)
    {
        $this->categoryLevel1 = $categoryLevel1;

        return $this;
    }

    /**
     * Get categoryLevel1
     *
     * @return string
     */
    public function getCategoryLevel1()
    {
        return $this->categoryLevel1;
    }

    /**
     * Set categoryLevel2
     *
     * @param string $categoryLevel2
     *
     * @return WadaIngredient
     */
    public function setCategoryLevel2($categoryLevel2)
    {
        $this->categoryLevel2 = $categoryLevel2;

        return $this;
    }

    /**
     * Get categoryLevel2
     *
     * @return string
     */
    public function getCategoryLevel2()
    {
        return $this->categoryLevel2;
    }

    /**
     * Set categoryLevel3
     *
     * @param string $categoryLevel3
     *
     * @return WadaIngredient
     */
    public function setCategoryLevel3($categoryLevel3)
    {
        $this->categoryLevel3 = $categoryLevel3;

        return $this;
    }

    /**
     * Get categoryLevel3
     *
     * @return string
     */
    public function getCategoryLevel3()
    {
        return $this->categoryLevel3;
    }

    /**
     * Set ingredient
     *
     * @param \AppBundle\Entity\Ingredient $ingredient
     *
     * @return WadaIngredient
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
