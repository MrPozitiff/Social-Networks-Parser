<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 022 22.09.17
 * Time: 23:13
 */

namespace AppBundle\Controller;


use AppBundle\Form\LoginForm;
use AppBundle\Library\Vkontakte\VkApiHelper;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SecurityController
 * @package AppBundle\Controller
 */
class SecurityController extends Controller
{

    /**
     * @Route("/login", name="secure_login")
     */
    public function loginAction(Request $request){
        $authenticationUtils = $this->get('security.authentication_utils');
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        //$lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->createForm(LoginForm::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            $user->setSalt('sdf');
            $datetime = new \DateTime('now');
            $user->setJoinDate( $datetime);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Регистрация прошла успешно!');

            return $this->redirectToRoute('homepage');
        }

        return $this->render(
            'security/login.html.twig',
            array(
                'loginForm' => $form->createView(),
                'error'         => $error,
            )
        );
    }

}