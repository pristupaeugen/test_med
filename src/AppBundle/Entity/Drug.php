<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

use JMS\Serializer\Annotation\Exclude;

/**
 * Drug
 *
 * @ORM\Table(name="drugs")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DrugRepository")
 */
class Drug
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
     * Many drugs have One country.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Country")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * Many records have One manufacturer.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Manufacturer")
     * @ORM\JoinColumn(name="manufacturers_id", referencedColumnName="id")
     */
    private $manufacturer;

    /**
     * Many records have One drug form.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\DrugForm")
     * @ORM\JoinColumn(name="drug_forms_id", referencedColumnName="id")
     */
    private $drugForm;

    /**
     * Many records have One drug type.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\DrugType")
     * @ORM\JoinColumn(name="drug_types_id", referencedColumnName="id")
     * @Exclude
     */
    private $drugType;

    /**
     * @ORM\Column(type="string", length=255, name="match_code")
     */
    private $matchCode;

    /**
     * One drug has many alternate names.
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\DrugAlternateName", mappedBy="drug")
     * @Exclude
     */
    private $drugAlternateNames;

    /**
     * One drug has many ingredients.
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\DrugIngredient", mappedBy="drug")
     * @Exclude
     */
    private $drugIngredients;

    /**
     * One medicine has many ingredients.
     */
    private $ingredients;

    /**
     * Check if this medicine belongs to auth user.
     */
    private $inMyPharmacist;

    /**
     * Check if this medicine is in match list of auth user.
     */
    private $inMyMatch;

    /**
     * Check if this medicine is in interaction list of auth user.
     */
    private $inMyInteractions;

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
        $this->drugAlternateNames = new \Doctrine\Common\Collections\ArrayCollection();
        $this->drugIngredients    = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ingredients        = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Drug
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
     * Set matchCode
     *
     * @param string $matchCode
     *
     * @return Drug
     */
    public function setMatchCode($matchCode)
    {
        $this->matchCode = $matchCode;

        return $this;
    }

    /**
     * Get matchCode
     *
     * @return string
     */
    public function getMatchCode()
    {
        return $this->matchCode;
    }

    /**
     * Add drugAlternateName
     *
     * @param \AppBundle\Entity\DrugAlternateName $drugAlternateName
     *
     * @return Drug
     */
    public function addDrugAlternateName(\AppBundle\Entity\DrugAlternateName $drugAlternateName)
    {
        $this->drugAlternateNames[] = $drugAlternateName;

        return $this;
    }

    /**
     * Remove drugAlternateName
     *
     * @param \AppBundle\Entity\DrugAlternateName $drugAlternateName
     */
    public function removeDrugAlternateName(\AppBundle\Entity\DrugAlternateName $drugAlternateName)
    {
        $this->drugAlternateNames->removeElement($drugAlternateName);
    }

    /**
     * Get drugAlternateNames
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDrugAlternateNames()
    {
        return $this->drugAlternateNames;
    }

    /**
     * Set manufacturer
     *
     * @param \AppBundle\Entity\Manufacturer $manufacturer
     *
     * @return Drug
     */
    public function setManufacturer(\AppBundle\Entity\Manufacturer $manufacturer = null)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Get manufacturer
     *
     * @return \AppBundle\Entity\Manufacturer
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Set drugType
     *
     * @param \AppBundle\Entity\DrugType $drugType
     *
     * @return Drug
     */
    public function setDrugType(\AppBundle\Entity\DrugType $drugType = null)
    {
        $this->drugType = $drugType;

        return $this;
    }

    /**
     * Get drugType
     *
     * @return \AppBundle\Entity\DrugType
     */
    public function getDrugType()
    {
        return $this->drugType;
    }

    /**
     * Set drugForm
     *
     * @param \AppBundle\Entity\DrugForm $drugForm
     *
     * @return Drug
     */
    public function setDrugForm(\AppBundle\Entity\DrugForm $drugForm = null)
    {
        $this->drugForm = $drugForm;

        return $this;
    }

    /**
     * Get drugForm
     *
     * @return \AppBundle\Entity\DrugForm
     */
    public function getDrugForm()
    {
        return $this->drugForm;
    }

    /**
     * Set country
     *
     * @param \AppBundle\Entity\Country $country
     *
     * @return Drug
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
     * Add drugIngredient
     *
     * @param \AppBundle\Entity\DrugIngredient $drugIngredient
     *
     * @return Drug
     */
    public function addDrugIngredient(\AppBundle\Entity\DrugIngredient $drugIngredient)
    {
        $this->drugIngredients[] = $drugIngredient;

        return $this;
    }

    /**
     * Remove drugIngredient
     *
     * @param \AppBundle\Entity\DrugIngredient $drugIngredient
     */
    public function removeDrugIngredient(\AppBundle\Entity\DrugIngredient $drugIngredient)
    {
        $this->drugIngredients->removeElement($drugIngredient);
    }

    /**
     * Get drugIngredients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDrugIngredients()
    {
        return $this->drugIngredients;
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

    /**
     * Define my match block
     * @param TokenStorageInterface $tokenStorage
     */
    public function defineMyMatch(TokenStorageInterface $tokenStorage)
    {
        $this->inMyMatch = false;

        $userMedicines = $tokenStorage->getToken()->getUser()->getMatches();
        foreach ($userMedicines as $userMedicine) {

            if ($userMedicine->getId() == $this->getId()) {

                $this->inMyMatch = true;
            }
        }
    }

    /**
     * Set identificator that medicine is in match list of auth user
     * @param bool $inMyMatch
     *
     * @return Drug
     */
    public function setInMyMatch($inMyMatch)
    {
        $this->inMyMatch = $inMyMatch;

        return $this;
    }

    /**
     * Get identificator that medicine is in match list of auth user
     *
     * @return bool
     */
    public function getInMyMatch()
    {
        return $this->inMyMatch;
    }

    /**
     * Define my interactions block
     * @param TokenStorageInterface $tokenStorage
     */
    public function defineMyInteractions(TokenStorageInterface $tokenStorage)
    {
        $this->inMyInteractions = false;

        $userMedicines = $tokenStorage->getToken()->getUser()->getInteractions();
        foreach ($userMedicines as $userMedicine) {

            if ($userMedicine->getId() == $this->getId()) {

                $this->inMyInteractions = true;
            }
        }
    }

    /**
     * Set identificator that medicine is in interactions list of auth user
     * @param bool $inMyInteractions
     *
     * @return Drug
     */
    public function setInMyInteractions($inMyInteractions)
    {
        $this->inMyInteractions = $inMyInteractions;

        return $this;
    }

    /**
     * Get identificator that medicine is in interactions list of auth user
     *
     * @return bool
     */
    public function getInMyInteractions()
    {
        return $this->inMyInteractions;
    }

    /**
     * Init medicine ingredients block
     */
    public function initMedicine()
    {
        if (empty($this->ingredients) && !empty($this->drugIngredients)) {

            foreach ($this->drugIngredients as $drugIngredient) {

                $ingredient = clone $drugIngredient->getIngredient();
                $ingredient->setStrength($drugIngredient->getStrength());
                $ingredient->setActive($drugIngredient->getActive());

                $this->addIngredient($ingredient);
            }
        }
    }

    /**
     * Add ingredient
     *
     * @param \AppBundle\Entity\Ingredient $ingredient
     *
     * @return Drug
     */
    public function addIngredient(\AppBundle\Entity\Ingredient $ingredient)
    {
        $this->ingredients[] = $ingredient;

        return $this;
    }

    /**
     * Remove ingredient
     *
     * @param \AppBundle\Entity\Ingredient $ingredient
     */
    public function removeIngredient(\AppBundle\Entity\Ingredient $ingredient)
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
}
