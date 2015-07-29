<?php

namespace Events\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
}
