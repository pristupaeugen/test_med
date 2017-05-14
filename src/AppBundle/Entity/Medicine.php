<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

use JMS\Serializer\Annotation\Exclude;

/**
 * Medicine
 *
 * @ORM\Table(name="omh_medicine")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MedicineRepository")
 *
 * @package V0
 */
class Medicine
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
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * Many medicines have One country.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CountryV0")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    private $country;

    /**
     * Many medicines have One category.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * One medicine has many descriptions.
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Description", mappedBy="medicine")
     */
    private $descriptions;

    /**
     * One medicine has many ingredients.
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\MedicineIngredient", mappedBy="medicine")
     * @Exclude
     */
    private $medicineIngredients;

    /**
     * One medicine has many ingredients.
     */
    private $ingredients;

    /**
     * Check if this medicine belongs to auth user.
     */
    private $inMyPharmacist;

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
     * Constructor
     */
    public function __construct()
    {
        $this->descriptions        = new \Doctrine\Common\Collections\ArrayCollection();
        $this->medicineIngredients = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ingredients         = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Medicine
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
     * Set country
     *
     * @param \AppBundle\Entity\Country $country
     *
     * @return Medicine
     */
    public function setCountry(\AppBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \AppBundle\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Medicine
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add description
     *
     * @param \AppBundle\Entity\Description $description
     *
     * @return Medicine
     */
    public function addDescription(\AppBundle\Entity\Description $description)
    {
        $this->descriptions[] = $description;

        return $this;
    }

    /**
     * Remove description
     *
     * @param \AppBundle\Entity\Description $description
     */
    public function removeDescription(\AppBundle\Entity\Description $description)
    {
        $this->descriptions->removeElement($description);
    }

    /**
     * Get descriptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDescriptions()
    {
        return $this->descriptions;
    }

    /**
     * Add ingredient
     *
     * @param \AppBundle\Entity\MedicineIngredient $ingredient
     *
     * @return Medicine
     */
    public function addMedicineIngredient(\AppBundle\Entity\MedicineIngredient $ingredient)
    {
        $this->medicineIngredients[] = $ingredient;

        return $this;
    }

    /**
     * Remove ingredient
     *
     * @param \AppBundle\Entity\MedicineIngredient $ingredient
     */
    public function removeMedicineIngredient(\AppBundle\Entity\MedicineIngredient $ingredient)
    {
        $this->medicineIngredients->removeElement($ingredient);
    }

    /**
     * Get ingredients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedicineIngredients()
    {
        return $this->medicineIngredients;
    }

    /**
     * Init medicine ingridients block
     */
    public function initMedicine()
    {
        if (empty($this->ingredients) && !empty($this->medicineIngredients)) {

            foreach ($this->medicineIngredients as $ingredient) {

                $this->addIngredient($ingredient->getIngredient());
            }
        }
    }

    /**
     * Add ingredient
     *
     * @param \AppBundle\Entity\IngredientV0 $ingredient
     *
     * @return Medicine
     */
    public function addIngredient(\AppBundle\Entity\IngredientV0 $ingredient)
    {
        $this->ingredients[] = $ingredient;

        return $this;
    }

    /**
     * Remove ingredient
     *
     * @param \AppBundle\Entity\IngredientV0 $ingredient
     */
    public function removeIngredient(\AppBundle\Entity\IngredientV0 $ingredient)
    {
        $this->ingredients->removeElement($ingredient);
    }

    /**
     * Get ingredients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Define my pharmacist block
     * @param TokenStorageInterface $tokenStorage
     */
    public function defineMyPharmacist(TokenStorageInterface $tokenStorage)
    {
        $this->inMyPharmacist = false;

        $userMedicines = $tokenStorage->getToken()->getUser()->getMedicines();
        foreach ($userMedicines as $userMedicine) {

            if ($userMedicine->getId() == $this->getId()) {

                $this->inMyPharmacist = true;
            }
        }
    }

    /**
     * Set identificator that medicine belongs to auth user
     * @param bool $inMyPharmacist
     *
     * @return Medicine
     */
    public function setInMyPharmacist($inMyPharmacist)
    {
        $this->inMyPharmacist = $inMyPharmacist;

        return $this;
    }

    /**
     * Get identificator that medicine belongs to auth user
     *
     * @return bool
     */
    public function getInMyPharmacist()
    {
        return $this->inMyPharmacist;
    }
}
