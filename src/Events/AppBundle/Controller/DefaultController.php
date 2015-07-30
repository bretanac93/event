<?php

namespace Events\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }

    public function notificationsAction()
    {

        $result = $this->get('app_utils')->sort($this->get('app_utils')->notificationsFor($this->getUser()));

        return $this->render('@App/Notification/index.html.twig', array('entities' => $result));
    }

    //TODO: Write the logic to delete a notification
    //Description: I have to persist the user logged and the notification that the user wants to delete.
    //TODO: After this, filter using this table, to show only non-deleted notifications to the user
    //Description: Note that this 'deletion' mode, is logical only, not physical.
    public function deleteNotificationsAction(Request $request)
    {

    }
}
