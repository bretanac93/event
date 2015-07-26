<?php
/**
 * Created by PhpStorm.
 * User: Cesar
 * Date: 7/21/2015
 * Time: 2:43 PM
 */

namespace Events\UserBundle\Controller;


use Events\UserBundle\Entity\ProfilePic;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProfilePictureController extends Controller
{
    public function uploadAction(Request $request)
    {
        $userLogged = $this->getUser();
        $profilePic = new ProfilePic();

        $profilePic->setUser($userLogged);

        $form = $this->createFormBuilder($profilePic)
            ->add('file')
            ->add('submit', 'submit', array('attr' => array('value'=>"Submit")))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($profilePic);
            $em->flush();
            //TODO: Need to override the fos_user_profile to show the profile picture as well.
            return $this->redirectToRoute('fos_user_profile_show');
        }

        return $this->render('@User/Profile/picture_upload.html.twig', array('form' => $form->createView()));
    }
}