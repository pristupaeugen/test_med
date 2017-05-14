<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use JMS\Serializer\Annotation\Exclude;

/**
 * Manufacturer
 *
 * @ORM\Table(name="manufacturers")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ManufacturerRepository")
 */
class Manufacturer
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
    private $name;

    /**
     * Many records have One type.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ManufacturerType")
     * @ORM\JoinColumn(name="manufacturer_types_id", referencedColumnName="id")
     * @Exclude
     */
    private $manufacturerType;

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
     * @return Manufacturer
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
     * Set manufacturerType
     *
     * @param \AppBundle\Entity\ManufacturerType $manufacturerType
     *
     * @return Manufacturer
     */
    public function setManufacturerType(\AppBundle\Entity\ManufacturerType $manufacturerType = null)
    {
        $this->manufacturerType = $manufacturerType;

        return $this;
    }

    /**
     * Get manufacturerType
     *
     * @return \AppBundle\Entity\ManufacturerType
     */
    public function getManufacturerType()
    {
        return $this->manufacturerType;
    }
}
