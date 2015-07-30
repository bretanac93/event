<?php
/**
 * Created by PhpStorm.
 * User: Cesar
 * Date: 7/16/2015
 * Time: 10:14 PM
 */

namespace Events\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="UserRepository")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Events\UserBundle\Entity\FollowUser", mappedBy="sender")
     */
    private $senders;

    /**
     * @ORM\OneToMany(targetEntity="Events\UserBundle\Entity\FollowUser", mappedBy="receiver")
     */
    private $receivers;

    /**
     * @ORM\OneToOne(targetEntity="ProfilePic", mappedBy="user")
     */
    private $profile_pic;


    /**
     * @ORM\OneToMany(targetEntity="Events\AppBundle\Entity\Notification", mappedBy="user_sent")
     */
    private $notifications_sent;

    /**
     * @ORM\OneToMany(targetEntity="Events\AppBundle\Entity\Notification", mappedBy="user_receive")
     */
    private $notifications_received;


    /**
     * @return ProfilePic
     */
    public function getProfilePic()
    {
        return $this->profile_pic;
    }

    /**
     * @param $profile_pic
     * @return $this
     */
    public function setProfilePic(ProfilePic $profile_pic)
    {
        $this->profile_pic = $profile_pic;

        return $this;
    }


    public function __construct()
    {
        parent::__construct();

        $this->senders = new ArrayCollection();
        $this->receivers = new ArrayCollection();
        $this->notifications_sent = new ArrayCollection();
        $this->notifications_received = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getSenders()
    {
        return $this->senders;
    }

    /**
     * @return ArrayCollection
     */
    public function getReceivers()
    {
        return $this->receivers;
    }

    /**
     * @return ArrayCollection
     */
    public function getNotificationsSent()
    {
        return $this->notifications_sent;
    }

    /**
     * @return ArrayCollection
     */
    public function getNotificationsReceived()
    {
        return $this->notifications_received;
    }

    public function __toString()
    {
        return $this->getUsername();
    }
}