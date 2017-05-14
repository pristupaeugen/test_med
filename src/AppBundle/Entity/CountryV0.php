<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CountryV0
 *
 * @ORM\Table(name="omh_country")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CountryV0Repository")
 *
 * @package V0
 */
class CountryV0
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
     * @var string $code
     *
     * @ORM\Column(name="code", type="string", length=2, unique=true, nullable=false)
     */
    protected $code;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=100, unique=true, nullable=false)
     */
    protected $name;


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
     * Set code
     *
     * @param string $code
     *
     * @return Country
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
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
}
