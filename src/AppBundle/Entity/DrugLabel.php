<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use JMS\Serializer\Annotation\Exclude;

/**
 * DrugLabel
 *
 * @ORM\Table(name="drug_label")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DrugLabelRepository")
 */
class DrugLabel
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
     * @ORM\Column(type="string", length=255, name="section_header")
     */
    private $sectionHeader;

    /**
     * @ORM\Column(type="integer", name="section_number")
     */
    private $sectionNumber;

    /**
     * Many records have One drug.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Drug")
     * @ORM\JoinColumn(name="drugs_id", referencedColumnName="id")
     * @Exclude
     */
    private $drug;

    /**
     * @ORM\Column(type="string", length=16777216, name="section_detail")
     */
    private $sectionDetail;

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
     * Set sectionHeader
     *
     * @param string $sectionHeader
     *
     * @return DrugLabel
     */
    public function setSectionHeader($sectionHeader)
    {
        $this->sectionHeader = $sectionHeader;

        return $this;
    }

    /**
     * Get sectionHeader
     *
     * @return string
     */
    public function getSectionHeader()
    {
        return $this->sectionHeader;
    }

    /**
     * Set sectionNumber
     *
     * @param boolean $sectionNumber
     *
     * @return DrugLabel
     */
    public function setSectionNumber($sectionNumber)
    {
        $this->sectionNumber = $sectionNumber;

        return $this;
    }

    /**
     * Get sectionNumber
     *
     * @return boolean
     */
    public function getSectionNumber()
    {
        return $this->sectionNumber;
    }

    /**
     * Set sectionDetail
     *
     * @param string $sectionDetail
     *
     * @return DrugLabel
     */
    public function setSectionDetail($sectionDetail)
    {
        $this->sectionDetail = $sectionDetail;

        return $this;
    }

    /**
     * Get sectionDetail
     *
     * @return string
     */
    public function getSectionDetail()
    {
        return $this->sectionDetail;
    }

    /**
     * Set drug
     *
     * @param \AppBundle\Entity\Drug $drug
     *
     * @return DrugLabel
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
}
