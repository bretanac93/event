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
            ->add('submit', 'submit', array('attr' => array('value'=>"Upload")))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $repo_img = $em->getRepository('UserBundle:ProfilePic')->findOneBy(array('user' => $userLogged));

            if ($repo_img != null) {
                $em->remove($repo_img);
                $em->flush();
            }

            $em->persist($profilePic);
            $em->flush();
            return $this->redirectToRoute('fos_user_profile_show');
        }

        return $this->render('@User/Profile/picture_upload.html.twig', array('form' => $form->createView()));
    }
}