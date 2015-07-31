<?php

namespace Events\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Events\UserBundle\Entity\User;

/**
 * Notification
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Events\AppBundle\Entity\NotificationRepository")
 */
class Notification
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
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Events\UserBundle\Entity\User", inversedBy="notifications_sent")
     * @ORM\JoinColumn(name="sender_id", referencedColumnName="id")
     */
    private $user_sent;

    /**
     * @ORM\ManyToOne(targetEntity="Events\UserBundle\Entity\User", inversedBy="notifications_received")
     * @ORM\JoinColumn(name="receiver_id", referencedColumnName="id")
     */
    private $user_receive;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=30)
     */
    private $type;


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
     * Set content
     *
     * @param string $content
     * @return Notification
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
     * Set date
     *
     * @param \DateTime $date
     * @return Notification
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
     * Set user
     *
     * @param User $user
     * @return Notification
     * @param string $creator
     */
    public function setSender(User $user)
    {
        $this->user_sent = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getSender()
    {
        return $this->user_sent;
    }

    /**
     * Set user
     *
     * @param User $user
     * @return Notification
     * @param string $creator
     */
    public function setReceiver(User $user)
    {
        $this->user_receive = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getReceiver()
    {
        return $this->user_receive;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function __toString()
    {
        return $this->content;
    }
}
