<?php

namespace Events\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DeletedNotification
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Events\AppBundle\Entity\DeletedNotificationRepository")
 */
class DeletedNotification
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
     * @ORM\ManyToOne(targetEntity="Events\UserBundle\Entity\User", inversedBy="id")
     *
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="notification_to_delete", type="string", length=255)
     */
    private $notificationToDelete;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted_date", type="datetime")
     */
    private $deletedDate;


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
     * Set userSender
     *
     * @param string $userSender
     * @return DeletedNotification
     */
    public function setUserSender($userSender)
    {
        $this->userSender = $userSender;

        return $this;
    }

    /**
     * Get userSender
     *
     * @return string 
     */
    public function getUserSender()
    {
        return $this->userSender;
    }

    /**
     * Set notificationToDelete
     *
     * @param string $notificationToDelete
     * @return DeletedNotification
     */
    public function setNotificationToDelete($notificationToDelete)
    {
        $this->notificationToDelete = $notificationToDelete;

        return $this;
    }

    /**
     * Get notificationToDelete
     *
     * @return string 
     */
    public function getNotificationToDelete()
    {
        return $this->notificationToDelete;
    }

    /**
     * Set deletedDate
     *
     * @param \DateTime $deletedDate
     * @return DeletedNotification
     */
    public function setDeletedDate($deletedDate)
    {
        $this->deletedDate = $deletedDate;

        return $this;
    }

    /**
     * Get deletedDate
     *
     * @return \DateTime 
     */
    public function getDeletedDate()
    {
        return $this->deletedDate;
    }
}
