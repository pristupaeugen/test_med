<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

use JMS\Serializer\Annotation\Exclude;

/**
 * ReminderAlarm
 *
 * @ORM\Table(name="reminder_alarm")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReminderAlarmRepository")
 */
class ReminderAlarm
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Exclude
     */
    private $id;

    /**
     * @var int $time
     * @ORM\Column(name="time", type="integer")
     * @Assert\Range(
     *      min = 1,
     *      max = 86400,
     *      minMessage = "Your time must be at least {{ limit }}",
     *      maxMessage = "Your time cannot be more than {{ limit }}"
     * )
     */
    private $time;

    /**
     * @ORM\Column(name="dose_value", type="integer")
     */
    private $doseValue;

    /**
     * @ORM\Column(name="dose_label", type="string", length=255)
     */
    private $doseLabel;

    /**
     * Many records have One reminder.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Reminder", inversedBy="alarms")
     * @ORM\JoinColumn(name="reminder_id", referencedColumnName="id")
     * @Exclude
     */
    private $reminder;

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
     * Set doseValue
     *
     * @param integer $doseValue
     *
     * @return ReminderAlarm
     */
    public function setDoseValue($doseValue)
    {
        $this->doseValue = $doseValue;

        return $this;
    }

    /**
     * Get doseValue
     *
     * @return integer
     */
    public function getDoseValue()
    {
        return $this->doseValue;
    }

    /**
     * Set doseLabel
     *
     * @param string $doseLabel
     *
     * @return ReminderAlarm
     */
    public function setDoseLabel($doseLabel)
    {
        $this->doseLabel = $doseLabel;

        return $this;
    }

    /**
     * Get doseLabel
     *
     * @return string
     */
    public function getDoseLabel()
    {
        return $this->doseLabel;
    }

    /**
     * Set reminder
     *
     * @param \AppBundle\Entity\Reminder $reminder
     *
     * @return ReminderAlarm
     */
    public function setReminder(\AppBundle\Entity\Reminder $reminder = null)
    {
        $this->reminder = $reminder;

        return $this;
    }

    /**
     * Get reminder
     *
     * @return \AppBundle\Entity\Reminder
     */
    public function getReminder()
    {
        return $this->reminder;
    }

    /**
     * Set time
     *
     * @param integer $time
     *
     * @return ReminderAlarm
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return integer
     */
    public function getTime()
    {
        return $this->time;
    }
}
