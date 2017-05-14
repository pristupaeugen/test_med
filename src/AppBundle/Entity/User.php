<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\SerializedName;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @UniqueEntity(
 *     fields={"email"},
 *     message="Email has already been registered in the system")
 */
class User implements UserInterface, \Serializable
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
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=64)
     * @Exclude
     */
    private $password;

    /**
     * @ORM\Column(name="salt", type="string")
     * @Exclude
     */
    private $salt;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min=2
     * )
     * @ORM\Column(name="first_name", type="string", length=100, nullable=false)
     */
    private $firstname;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min=2
     * )
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     * @Exclude
     */
    private $username;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min=6,
     *     max=4096
     * )
     * @Exclude
     * @Type("string")
     */
    private $plainPassword;

    /**
     * One user has many tokens.
     * @ORM\OneToMany(targetEntity="RestBundle\Entity\Token", mappedBy="user")
     */
    private $tokens;

    /**
     * Many Users have Many Medicines.
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Drug")
     * @ORM\JoinTable(name="user_drug",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="drugs_id", referencedColumnName="id")}
     *      )
     * @Exclude
     */
    private $medicines;

    /**
     * Many Users have Many Matches.
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Drug")
     * @ORM\JoinTable(name="user_match",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="drugs_id", referencedColumnName="id")}
     *      )
     * @Exclude
     */
    private $matches;

    /**
     * Many Users have Many Interactions.
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Drug")
     * @ORM\JoinTable(name="user_interaction",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="drugs_id", referencedColumnName="id")}
     *      )
     * @Exclude
     */
    private $interactions;

    /**
     * One user has many reminders.
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Reminder", mappedBy="user")
     * @Exclude
     */
    private $reminders;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->isActive = true;
        $this->salt     = md5(uniqid(null, true));
        $this->tokens   = new ArrayCollection();
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
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        $this->setUsername($email);

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
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
     * Set plain password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;

        return $this;
    }

    /**
     * Get plain password
     *
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * Removes sensitive data from the user
     */
    public function eraseCredentials()
    {
        $this->setPlainPassword(null);
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->salt
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->salt
            ) = unserialize($serialized);
    }

    /**
     * Add token
     *
     * @param \RestBundle\Entity\Token $token
     *
     * @return User
     */
    public function addToken(\RestBundle\Entity\Token $token)
    {
        $this->tokens[] = $token;

        return $this;
    }

    /**
     * Remove token
     *
     * @param \RestBundle\Entity\Token $token
     */
    public function removeToken(\RestBundle\Entity\Token $token)
    {
        $this->tokens->removeElement($token);
    }

    /**
     * Get tokens
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTokens()
    {
        return $this->tokens;
    }

    /**
     * Add medicine
     *
     * @param \AppBundle\Entity\Drug $medicine
     *
     * @return User
     */
    public function addMedicine(\AppBundle\Entity\Drug $medicine)
    {
        $this->medicines[] = $medicine;

        return $this;
    }

    /**
     * Remove medicine
     *
     * @param \AppBundle\Entity\Drug $medicine
     */
    public function removeMedicine(\AppBundle\Entity\Drug $medicine)
    {
        $this->medicines->removeElement($medicine);
    }

    /**
     * Get medicines
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedicines()
    {
        return $this->medicines;
    }

    /**
     * Add match
     *
     * @param \AppBundle\Entity\Drug $match
     *
     * @return User
     */
    public function addMatch(\AppBundle\Entity\Drug $match)
    {
        $this->matches[] = $match;

        return $this;
    }

    /**
     * Remove match
     *
     * @param \AppBundle\Entity\Drug $match
     */
    public function removeMatch(\AppBundle\Entity\Drug $match)
    {
        $this->matches->removeElement($match);
    }

    /**
     * Get matches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMatches()
    {
        return $this->matches;
    }

    /**
     * Add interaction
     *
     * @param \AppBundle\Entity\Drug $interaction
     *
     * @return User
     */
    public function addInteraction(\AppBundle\Entity\Drug $interaction)
    {
        $this->interactions[] = $interaction;

        return $this;
    }

    /**
     * Remove interaction
     *
     * @param \AppBundle\Entity\Drug $interaction
     */
    public function removeInteraction(\AppBundle\Entity\Drug $interaction)
    {
        $this->interactions->removeElement($interaction);
    }

    /**
     * Get interactions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInteractions()
    {
        return $this->interactions;
    }

    /**
     * Add reminder
     *
     * @param \AppBundle\Entity\Reminder $reminder
     *
     * @return User
     */
    public function addReminder(\AppBundle\Entity\Reminder $reminder)
    {
        $this->reminders[] = $reminder;

        return $this;
    }

    /**
     * Remove reminder
     *
     * @param \AppBundle\Entity\Reminder $reminder
     */
    public function removeReminder(\AppBundle\Entity\Reminder $reminder)
    {
        $this->reminders->removeElement($reminder);
    }

    /**
     * Get reminders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReminders()
    {
        return $this->reminders;
    }
}
