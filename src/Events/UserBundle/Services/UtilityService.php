<?php
/**
 * Created by PhpStorm.
 * User: Cesar
 * Date: 7/17/2015
 * Time: 8:10 PM
 */

namespace Events\UserBundle\Services;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Events\AppBundle\Entity\Notification;
use Events\UserBundle\Entity\FollowUser;
use Events\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\Container;

class UtilityService
{
    private $container = null;

    public function __construct(EntityManager $container)
    {
        $this->container = $container;
    }

    /**
     * @param User $user
     * @return array|\Events\UserBundle\Entity\User[]
     */
    public function getFollowers(User $user)
    {
        $em = $this->container;
        $repository = $em->getRepository('UserBundle:FollowUser')->findBy(array('receiver' => $user));

        $result = $this->buildUserArray($repository, 'sender');

        return $result;
    }

    /**
     * @param User $user
     * @return array|\Events\UserBundle\Entity\User[]
     */
    public function getFollowing(User $user)
    {
        $em = $this->container;
        $repository = $em->getRepository('UserBundle:FollowUser')->findBy(array('sender' => $user));

        $result = $this->buildUserArray($repository, 'receiver');

        return $result;
    }

    private function buildUserArray(array $follow_users, $option)
    {
        $result = array();

        $em = $this->container;

        switch ($option) {
            case 'sender':
                for ($i = 0; $i < count($follow_users); $i++) {
                    array_push($result, $follow_users[$i]->getSender());
                }
                break;
            case 'receiver':
                for ($i = 0; $i < count($follow_users); $i++) {
                    array_push($result, $follow_users[$i]->getReceiver());
                }
                break;
        }

        return $result;
    }

    public function sort(array $notifications)
    {
        $result = $notifications;
        $this->quickSort($result, 0, count($result) - 1);
        return $result;
    }

    /**
     * @param array|\Events\AppBundle\Entity\Notification[] $notifications
     * @param $lo
     * @param $hi
     */
    private function quickSort(array $arr, $lo, $hi)
    {
        if ($lo < $hi) {
            $mid = $this->partition($arr, $lo, $hi);
            $this->quickSort($arr, $lo, $mid - 1);
            $this->quickSort($arr, $mid + 1, $hi);
        }
    }

    private function partition(array $arr, $lo, $hi)
    {
        $x = $arr[$hi]->getDate();
        $i = $lo - 1;
        for ($j = $lo; $j < $hi; $j++) {
            if ($arr[$j]->getDate() >= $x) {
                $i += 1;
                $this->swap($arr[$i], $arr[$j]);
            }
        }
        $this->swap($arr[$i + 1], $arr[$hi]);
        return $i + 1;
    }

    private function swap($a, $b)
    {
        $temp = $a;
        $a = $b;
        $b = $temp;
    }

    /**
     * @param User $user
     * @return array|\Events\AppBundle\Entity\Notification[] $notifications
     */
    public function notificationsFor(User $user)
    {

        $em = $this->container;

        $array_following = $this->getFollowing($user);

        $notifications = array();

        for ($i = 0; $i < count($array_following); $i++) {
            $current_user = $array_following[$i];
            $current_notifications = $current_user->getNotificationsReceived();
            for ($j = 0; $j < count($current_notifications); $j++) {
                array_push($notifications, $current_notifications[$j]);
            }
        }

        return $notifications;
    }

    /**
     * @param User $sender
     * @param User $receiver
     * @param $status
     * @return bool
     */
    public function hasFriendRequest(User $sender, User $receiver, $status = null)
    {
        $em = $this->container;
        if ($status != null)
            $result = $em->getRepository('UserBundle:FollowUser')->findOneBy(array('sender' => $sender, 'receiver' => $receiver, 'status' => $status));
        else
            $result = $em->getRepository('UserBundle:FollowUser')->findOneBy(array('sender' => $sender, 'receiver' => $receiver));

        return isset($result);
    }

    /**
     * @param User $creator
     * @param array $receivers
     * @param $content
     * @param $type
     */
    public function addNotification(User $creator, $receivers, $content, $type)
    {
        $receivers = $this->buildArrayFromCollection($receivers);
        $em = $this->container;
        for ($i = 0; $i < count($receivers); $i++) {
            $notification = new Notification();
            $notification->setContent($content);
            $notification->setSender($creator);
            $notification->setReceiver($receivers[$i]);
            $notification->setDate(new \DateTime('now'));
            $notification->setType($type);
            $em->persist($notification);
        }
        $em->flush();
    }

    public function buildArrayFromCollection($collection)
    {
        $result = array();
        for ($i = 0; $i < count($collection); $i++) {
            array_push($result, $collection[$i]);
        }
        return $result;
    }

} 