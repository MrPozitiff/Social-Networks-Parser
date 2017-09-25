<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 022 22.09.17
 * Time: 11:17
 */

namespace AppBundle\Controller;

use AppBundle\Entity\SocialNetworks;
use AppBundle\Model\SocialNetworkAuth;
use AppBundle\Model\Vk\VkAuth;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class SocialNetAuthController
 * @package AppBundle\Controller
 */
class SocialNetAuthController extends Controller
{

    /**
     * Login throws social network
     *
     * Matches /login/*
     * @Route("/login/{login_type}", name="login_route", requirements={"login_type":"\w\w"})
     */
    public function SocialLogin(SocialNetworks $name, Request $request){
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')){
            $request->getSession()->getFlashBag()->add('notice', 'You\'ve already authorized');
            return $this->redirect('homepage');
        }
        //if(){

        //}
        $auth = new SocialNetworkAuth($name, $param);

    }


    /**
     * Deprecated, will move to SocialLogin
     * @Route("/login/vklogin", name="vk_login")
     */
    public function VkLogin(Request $request){
        // if user logged
        //if($request->getSession()->has('user')){
        //    $this->addFlash('notice', 'You\'ve already authorized');
        //    return $this->redirectToRoute('homepage');
        //}
        // if new user
        $vk_auth = new VkAuth($this->container->getParameter('vk_params'));
        if (!$request->query->has('code')){
            return $this->redirect($vk_auth->GetAuthCodeUrl());
        }
        // if error received
        if ($request->query->has('error') && $request->query->has('error_description')){
            $this->addFlash('error', 'Something went wrong: ' . $request->query->get('error') . ', with description: ' . $request->query->get('error_description'));
            return $this->redirectToRoute('homepage');
        }
        //try to get user id and access token
        $token = json_decode($vk_auth->GetUserToken($request->query->get('code')));
              dump($token); $die;
        // if in array presented user id and access token try to get user info
        if (isset($token['access_token']) && isset($token['user_id'])){

        } else {
            $this->addFlash('error', 'Something went wrong: ' . $token['error'] . ', with description: ' . $token['error_description']);
            return $this->redirectToRoute('homepage');
        }

    }

}