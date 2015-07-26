<?php
/**
 * Created by PhpStorm.
 * User: Cesar
 * Date: 7/17/2015
 * Time: 8:10 PM
 */

namespace Events\UserBundle\Services;


use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

class UtilityService {
    private $container = null;
    public function __construct(EntityManager $container) {
        $this->container = $container;
    }
    public function getFollowers($id) {
        $cont = new Container();
        $em = $this->$container;
        $repository = $em->getRepository('UserBundle:FollowUser')->findBy(array('toUser' => $id));

        return $repository;
    }

    public function getFollowing($id) {
        $cont = new Container();
        $em = $this->container;
        $repository = $em->getRepository('UserBundle:FollowUser')->findBy(array('fromUser' => $id));

        return $repository;
    }

} 