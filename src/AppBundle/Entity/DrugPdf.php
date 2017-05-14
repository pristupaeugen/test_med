<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DrugPdf
 *
 * @ORM\Table(name="drug_pdf")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DrugPdfRepository")
 */
class DrugPdf
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
     * @ORM\Column(type="string", length=255, name="pdf_file")
     */
    private $pdfFile;

    /**
     * Many records have One drug.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Drug")
     * @ORM\JoinColumn(name="drugs_id", referencedColumnName="id")
     */
    private $drug;

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
     * Set pdfFile
     *
     * @param string $pdfFile
     *
     * @return DrugPdf
     */
    public function setPdfFile($pdfFile)
    {
        $this->pdfFile = $pdfFile;

        return $this;
    }

    /**
     * Get pdfFile
     *
     * @return string
     */
    public function getPdfFile()
    {
        return $this->pdfFile;
    }

    /**
     * Set drug
     *
     * @param \AppBundle\Entity\Drug $drug
     *
     * @return DrugPdf
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
