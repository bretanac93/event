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

        $user_logged = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('UserBundle:User')->findAll();

        $users_result = array();

        for ($i = 0; $i < count($users); $i++) {
            if ($users[$i]->getUsername() != $user_logged)
                array_push($users_result, $users[$i]);
        }

        $users_request_status = array();

        $follow_users_repository = $em->getRepository('UserBundle:FollowUser');

        //First, we have to check the status of every users in FollowUsers entity
        $list = $follow_users_repository->findBy(array('sender' => $user_logged));

        if (count($list) == 0) {
            $users_request_status = null;
            return $this->render('UserBundle:Default:index.html.twig', array(
                'entities' => $users_result,
                'requests_status' => $users_request_status
            ));
        }

        for ($i = 0; $i < count($users_result); $i++) {
            $temp = $follow_users_repository->findOneBy(array('sender' => $user_logged, 'receiver' => $users_result[$i]));

            //If it's null there is not friend request, show the button
            if ($temp == null) {
                $users_request_status[$users_result[$i]->getId()] = 0;
//                print_r($users_request_status);
                return $this->render('UserBundle:Default:index.html.twig', array(
                    'entities' => $users_result,
                    'requests_status' => $users_request_status
                ));
            }

            switch ($temp->getStatus()) {
                case "Pending":
                    $users_request_status[$users_result[$i]->getId()] = 1;
                    break;
                case "Accepted":
                    $users_request_status[$users_result[$i]->getId()] = 2;
                    break;
                default:
                    $users_request_status[$users_result[$i]->getId()] = 0;
                    break;
            }
        }

        return $this->render('UserBundle:Default:index.html.twig', array(
            'entities' => $users_result,
            'requests_status' => $users_request_status
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



}
