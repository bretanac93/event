<?php

namespace Events\AppBundle\Controller;

use Events\UserBundle\Entity\FollowUser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    // Get all users in the system.
    public function indexAction()
    {
        if ($this->getUser() == null)
            return $this->render('UserBundle:Default:index.html.twig');

        $dc = $this->get('app_utils');
        $user_logged = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('UserBundle:User')->findAll();

        $users_result = array();


        for ($i = 0; $i < count($users); $i++) {
            if ($users[$i]->getUsername() != $user_logged && !$dc->hasFriendRequest($user_logged, $users[$i]))
                array_push($users_result, $users[$i]);
        }

        return $this->render('UserBundle:Default:index.html.twig', array(
            'entities' => $users_result
        ));
    }

    public function followRequestAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $sender = $this->getUser();
        $receiver = $em->getRepository('UserBundle:User')->find($request->get('to_id'));

        $follow_user_entity = new FollowUser();

        $follow_user_entity
            ->setSender($sender)
            ->setReceiver($receiver)
            ->setCreationDate(new \DateTime('now'))
            ->setStatus('Pending');

        $em->persist($follow_user_entity);
        $em->flush();
        $dc = $this->get('app_utils');

        $content = sprintf("%s sent a friend request to %s", $sender->getUsername(), $receiver->getUsername());
        $this->get('app_utils')->addNotification($sender, $dc->getFollowers($sender), $content, 'friend-request');

        return $this->redirect($this->generateUrl('app_homepage'));
    }

    public function followRequestsAction()
    {

        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('UserBundle:FollowUser')->findBy(array('receiver' => $user, 'status' => "Pending"));
        return $this->render('AppBundle:Default:followrequests.html.twig', array('entities' => $repository));
    }

    //Accept friend request.
    public function acceptRequestAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $sender = $em->getRepository('UserBundle:User')->find($request->get('from_id'));
        $receiver = $this->getUser();

        $follow_request_accept = $em->getRepository('UserBundle:FollowUser')->findOneBy(array('sender' => $sender, 'receiver' => $receiver));

        $follow_request_accept->setStatus("Accepted");

        $em->persist($follow_request_accept);
        $em->flush();
        $dc = $this->get('app_utils');
        $content = sprintf("%s accepted the %s friend request", $receiver->getUsername(), $sender->getUsername());
        $this->get('app_utils')->addNotification($receiver, $dc->getFollowers($sender), $content, 'friend-request-accepted');

        return $this->redirect($this->generateUrl('app_follow_requests'));
    }

    public function followingAction()
    {
        $entities = $this->getDoctrine()->getManager()->getRepository('UserBundle:FollowUser')->findBy(array('sender' => $this->getUser(), 'status' => "Accepted"));

        return $this->render('AppBundle:Default:following.html.twig', array('entities' => $entities));
    }

    public function followersAction()
    {
        $entities = $this->getDoctrine()->getManager()->getRepository('UserBundle:FollowUser')->findBy(array('receiver' => $this->getUser(), 'status' => "Accepted"));

        return $this->render('AppBundle:Default:followers.html.twig', array('entities' => $entities));
    }

    public function pendingRequestsAction()
    {
        if ($this->getUser() == null)
            return $this->render('AppBundle:Default:index.html.twig');

        $dc = $this->get('app_utils');
        $user_logged = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('UserBundle:User')->findAll();

        $users_result = array();

        for ($i = 0; $i < count($users); $i++) {
            if ($users[$i]->getUsername() != $user_logged && !$dc->hasFriendRequest($user_logged, $users[$i], "Pending"))
                array_push($users_result, $users[$i]);
        }

        return $this->render('UserBundle:Default:pending.html.twig', array(
            'entities' => $users_result
        ));
    }

}
