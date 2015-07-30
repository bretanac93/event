<?php

namespace Events\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Events\AppBundle\Entity\EventRepository")
 */
class Event
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="skills", type="string", length=255)
     */
    private $skills;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="time")
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal")
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacity", type="integer")
     */
    private $capacity;

    /**
     * @var boolean
     *
     * @ORM\Column(name="share_cost", type="boolean")
     */
    private $shareCost;

    /**
     * @var string
     *
     * @ORM\Column(name="event_type", type="string", length=255)
     */
    private $eventType;

    /**
     * @ORM\ManyToOne(targetEntity="Events\UserBundle\Entity\User", inversedBy="isOrganizer")
     * @ORM\JoinColumn(name="isOrganizer", referencedColumnName="id")
     */
    private $isOrganizer;

    /**
     * @ORM\ManyToOne(targetEntity="Events\UserBundle\Entity\User", inversedBy="uploader")
     * @ORM\JoinColumn(name="uploader", referencedColumnName="id")
     */
    private $uploader;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Event
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
     * Set capacity
     *
     * @param integer $capacity
     * @return Event
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return integer
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return Event
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Event
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set skills
     *
     * @param string $skills
     * @return Event
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;

        return $this;
    }

    /**
     * Get skills
     *
     * @return string 
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Event
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     * @return Event
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Event
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set shareCost
     *
     * @param boolean $shareCost
     * @return Event
     */
    public function setShareCost($shareCost)
    {
        $this->shareCost = $shareCost;

        return $this;
    }

    /**
     * Get shareCost
     *
     * @return boolean 
     */
    public function getShareCost()
    {
        return $this->shareCost;
    }

    /**
     * Set eventType
     *
     * @param string $eventType
     * @return Event
     */
    public function setEventType($eventType)
    {
        $this->eventType = $eventType;

        return $this;
    }

    /**
     * Get eventType
     *
     * @return string 
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * Set isOrganizer
     *
     * @param boolean $isOrganizer
     * @return Event
     */
    public function setIsOrganizer($isOrganizer)
    {
        $this->isOrganizer = $isOrganizer;

        return $this;
    }

    /**
     * Get isOrganizer
     *
     * @return boolean 
     */
    public function getIsOrganizer()
    {
        return $this->isOrganizer;
    }

    /**
     * Set uploader
     *
     * @param string $uploader
     * @return Event
     */
    public function setUploader($uploader)
    {
        $this->uploader = $uploader;

        return $this;
    }

    /**
     * Get uploader
     *
     * @return string 
     */
    public function getUploader()
    {
        return $this->uploader;
    }
}
