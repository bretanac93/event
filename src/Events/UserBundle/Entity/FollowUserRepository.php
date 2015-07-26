<?php

namespace Events\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * FollowUserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FollowUserRepository extends EntityRepository
{
    public function getPendingFollowRequests($userId) {
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT fu FROM UserBundle:FollowUser fu WHERE fu.toUser = :user_id AND fu.status = :status");
        $query->setParameter('user_id', $userId);
        $query->setParameter('status', "Pending");

        return $query->getResult();
    }

    public function Following($userId) {
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT u FROM UserBundle:User u JOIN UserBundle:FollowUser fu WHERE fu.fromUser = :id AND u.id = :id");
        $query->setParameter('id', $userId);

        return $query->getResult();
    }

    public function Followers($userId) {
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT u FROM UserBundle:User u JOIN UserBundle:FollowUser fu WHERE fu.toUser = :id AND fu.toUser = u.id");
        $query->setParameter('id', $userId);

        return $query->getResult();
    }

}
