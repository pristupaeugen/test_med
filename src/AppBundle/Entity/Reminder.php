<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;

use JMS\Serializer\Annotation\Exclude;

/**
 * Reminder
 *
 * @ORM\Table(name="reminder")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReminderRepository")
 */
class Reminder
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
     * @ORM\Column(type="boolean", options={"default" : 0})
     */
    private $enabled = false;

    /**
     * @var \DateTime $startDate
     * @ORM\Column(name="start_date", type="datetime")
     * @Exclude
     */
    private $startDate;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private $duration = 0;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private $frequency = 0;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private $increment = 0;

    /**
     * Many records have One drug.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Drug")
     * @ORM\JoinColumn(name="drugs_id", referencedColumnName="id")
     */
    private $drug;

    /**
     * Many records have One user.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @Exclude
     */
    private $user;

    /**
     * One reminder has many alarms.
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ReminderAlarm", mappedBy="reminder", cascade={"remove", "persist"})
     */
    private $alarms;

    /**
     * @var timestamp $startDateTimestamp
     */
    private $startDateTimestamp;

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
        $this->alarms = new \Doctrine\Common\Collections\ArrayCollection();
        $this->startDate = new \DateTime();
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return Reminder
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Reminder
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return Reminder
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set frequency
     *
     * @param integer $frequency
     *
     * @return Reminder
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;

        return $this;
    }

    /**
     * Get frequency
     *
     * @return integer
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * Set increment
     *
     * @param integer $increment
     *
     * @return Reminder
     */
    public function setIncrement($increment)
    {
        $this->increment = $increment;

        return $this;
    }

    /**
     * Get increment
     *
     * @return integer
     */
    public function getIncrement()
    {
        return $this->increment;
    }

    /**
     * Set drug
     *
     * @param \AppBundle\Entity\Drug $drug
     *
     * @return Reminder
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

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Reminder
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add alarm
     *
     * @param \AppBundle\Entity\ReminderAlarm $alarm
     *
     * @return Reminder
     */
    public function addAlarm(\AppBundle\Entity\ReminderAlarm $alarm)
    {
        $this->alarms[] = $alarm;

        return $this;
    }

    /**
     * Remove alarm
     *
     * @param \AppBundle\Entity\ReminderAlarm $alarm
     */
    public function removeAlarm(\AppBundle\Entity\ReminderAlarm $alarm)
    {
        $this->alarms->removeElement($alarm);
    }

    /**
     * Get alarms
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAlarms()
    {
        return $this->alarms;
    }

    /**
     * Clear alarms
     *
     * @return Reminder
     */
    public function clearAlarms()
    {
        $this->alarms->clear();

        return $this;
    }

    /**
     * Set startDateTimestamp
     *
     * @param timestamp $startDateTimestamp
     *
     * @return Reminder
     */
    public function setStartDateTimestamp($startDateTimestamp)
    {
        $this->startDateTimestamp = $startDateTimestamp;

        return $this;
    }

    /**
     * Get startDateTimestamp
     *
     * @return timestamp
     */
    public function getStartDateTimestamp()
    {
        return $this->startDateTimestamp;
    }
}
