<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description
 *
 * @ORM\Table(name="omh_description")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DescriptionRepository")
 *
 * @package V0
 */
class Description
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
     * @var string $title
     *
     * @ORM\Column(name="title", type="string")
     */
    protected $title;

    /**
     * @var string $content
     *
     * @ORM\Column(name="content", type="text")
     */
    protected $content;

    /**
     * Many descriptions have One medicine.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Medicine", inversedBy="descriptions")
     * @ORM\JoinColumn(name="medicine_id", referencedColumnName="id")
     */
    private $medicine;


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
     * Set title
     *
     * @param string $title
     *
     * @return Description
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Description
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set medicine
     *
     * @param \AppBundle\Entity\Medicine $medicine
     *
     * @return Description
     */
    public function setMedicine(\AppBundle\Entity\Medicine $medicine = null)
    {
        $this->medicine = $medicine;

        return $this;
    }

    /**
     * Get medicine
     *
     * @return \AppBundle\Entity\Medicine
     */
    public function getMedicine()
    {
        return $this->medicine;
    }
}
