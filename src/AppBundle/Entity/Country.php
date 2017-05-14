<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use JMS\Serializer\Annotation\Exclude;

/**
 * Country
 *
 * @ORM\Table(name="country")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CountryRepository")
 * @ORM\Cache(usage="READ_ONLY", region="static")
 */
class Country
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true, nullable=false)
     */
    protected $name;

    /**
     * @var string $iso2Code
     *
     * @ORM\Column(name="iso_2_code", type="string", length=2, unique=true, nullable=false)
     */
    protected $iso2Code;

    /**
     * @var string $iso3Code
     *
     * @ORM\Column(name="iso_3_code", type="string", length=3, unique=true, nullable=false)
     * @Exclude
     */
    protected $iso3Code;

    /**
     * @var string $isoNumCode
     *
     * @ORM\Column(name="iso_num_code", type="integer", length=6, unique=true, nullable=false)
     * @Exclude
     */
    protected $isoNumCode;

    /**
     * @var string $name
     *
     * @ORM\Column(name="domain", type="string", length=3)
     * @Exclude
     */
    protected $domain;

    /**
     * @ORM\Column(name="is_active", type="boolean", options={"default" : 0})
     * @Exclude
     */
    private $isActive;

    /**
     * Keep matches count
     */
    private $matchesCount;

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
     * @return Country
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
     * Set iso2Code
     *
     * @param string $iso2Code
     *
     * @return Country
     */
    public function setIso2Code($iso2Code)
    {
        $this->iso2Code = $iso2Code;

        return $this;
    }

    /**
     * Get iso2Code
     *
     * @return string
     */
    public function getIso2Code()
    {
        return $this->iso2Code;
    }

    /**
     * Set iso3Code
     *
     * @param string $iso3Code
     *
     * @return Country
     */
    public function setIso3Code($iso3Code)
    {
        $this->iso3Code = $iso3Code;

        return $this;
    }

    /**
     * Get iso3Code
     *
     * @return string
     */
    public function getIso3Code()
    {
        return $this->iso3Code;
    }

    /**
     * Set isoNumCode
     *
     * @param integer $isoNumCode
     *
     * @return Country
     */
    public function setIsoNumCode($isoNumCode)
    {
        $this->isoNumCode = $isoNumCode;

        return $this;
    }

    /**
     * Get isoNumCode
     *
     * @return integer
     */
    public function getIsoNumCode()
    {
        return $this->isoNumCode;
    }

    /**
     * Set domain
     *
     * @param string $domain
     *
     * @return Country
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Country
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set matches count
     * @param int $matchesCount
     *
     * @return Country
     */
    public function setMatchesCount($matchesCount)
    {
        $this->matchesCount = $matchesCount;

        return $this;
    }

    /**
     * Get matches count
     *
     * @return int
     */
    public function getMatchesCount()
    {
        return $this->matchesCount;
    }
}
