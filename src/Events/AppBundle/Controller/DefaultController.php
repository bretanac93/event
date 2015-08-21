<?php

namespace Events\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }

    public function notificationsAction()
    {
        $user = $this->getUser();
        $result = $this->get('app_utils')->sort($this->get('app_utils')->buildArrayFromCollection($user->getNotificationsReceived()));

        return $this->render('@App/Notification/index.html.twig', array('entities' => $result));
    }

    public function deleteNotificationsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        if ($request->get('notification-id') == null || $request->get('notification-id') < 0)
            return $this->redirect($this->generateUrl('app_user_notifications'));

        $notification = $this->getDoctrine()->getManager()->getRepository('AppBundle:Notification')->find($request->get('notification-id'));
        $em->remove($notification);
        $em->flush();
        return $this->redirect($this->generateUrl('app_user_notifications'));
    }

    public function searchAction()
    {
    }
}
