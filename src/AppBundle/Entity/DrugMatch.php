<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManagerInterface;

use JMS\Serializer\Annotation\Exclude;

/**
 * DrugMatch
 *
 * @ORM\Table(name="drugs_match")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DrugMatchRepository")
 */
class DrugMatch
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
     * @ORM\Column(type="string", length=255, name="match_code")
     */
    private $matchCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Exclude
     */
    private $strength;

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
     * @var array
     * One match has many ingredients.
     */
    private $ingredients = [];

    /**
     * @var float
     * Match between drug and its drug match
     */
    private $match = 0;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ingredients = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return DrugMatch
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
     * @return DrugMatch
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
     * Set strength
     *
     * @param string $strength
     *
     * @return DrugMatch
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
     * Set manufacturer
     *
     * @param \AppBundle\Entity\Manufacturer $manufacturer
     *
     * @return DrugMatch
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
     * Set country
     *
     * @param \AppBundle\Entity\Country $country
     *
     * @return DrugMatch
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
     * Set drugForm
     *
     * @param \AppBundle\Entity\DrugForm $drugForm
     *
     * @return DrugMatch
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
     * Define ingredients block
     */
    public function defineIngredients(EntityManagerInterface $entityManager)
    {
        if (empty($this->ingredients) && !empty($this->getStrength())) {

            $data = $this->_parseStrength($this->getStrength());
            if (count($data) > 0) {

                foreach ($data as $arr) {

                    $ingredient = $entityManager->getRepository('AppBundle:Ingredient')->findByName($arr['name']);
                    if ($ingredient) {

                        $ingredient = clone $ingredient;
                        $ingredient->setStrength($arr['strength']);
                        $this->addIngredient($ingredient);
                    }
                }
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

    /**
     * Calculate match for drug
     * @param Drug $drug
     */
    public function calculateMatchFor(Drug $drug)
    {
        $this->match = 0;

        // calculate ingredients match
        $strengths = [];
        foreach ($this->getIngredients() as $ingredient) {

            if (!isset($strengths[$ingredient->getId()])) {

                $strengths[$ingredient->getId()] = 0;
            }

            if ($strengths[$ingredient->getId()] < $ingredient->getStrength()) {

                $strengths[$ingredient->getId()] = $ingredient->getStrength();
            }
        }

        $ingredientMatch = 0;
        foreach ($drug->getIngredients() as $ingredient) {

            if (isset($strengths[$ingredient->getId()])) {

                $maxStrength = max($strengths[$ingredient->getId()], $ingredient->getStrength());
                $deviation   = abs($strengths[$ingredient->getId()] - $ingredient->getStrength());

                $ingredientMatch += ($maxStrength - $deviation) / $maxStrength;

                continue;
            }

            $ingredientMatch += 1;
        }

        $ingredientMatch = $ingredientMatch/count($drug->getIngredients());

        // calculate forms match
        $formsMatch = (int)($drug->getDrugForm() == $this->getDrugForm());

        // calculate manufacturer match
        $manufacturerMatch = (int)($drug->getManufacturer() == $this->getManufacturer());

        $this->match = (float)number_format(100 * ($ingredientMatch + $formsMatch + $manufacturerMatch) / 3, 2);

        $this->match = ceil($this->match);
    }

    /**
     * Set match
     * @param $match
     * @return $this
     */
    public function setMatch($match)
    {
        $this->match = $match;

        return $this;
    }

    /**
     * Get match
     * @return float
     */
    public function getMatch()
    {
        return $this->match;
    }

    /**
     * Parse strength
     *
     * @param $strength
     * @return array
     */
    protected function _parseStrength($strength) {

        preg_match_all("/([\w\s\+]+)\W([\w\s\.]+)\W/",
            $strength,
            $matches, PREG_SET_ORDER);

        $data = [];
        foreach ($matches as $match) {

            $data[] = [

                'name'     => trim($match[1], " +"),
                'strength' => trim($match[2])
            ];
        }

        return $data;
    }
}
