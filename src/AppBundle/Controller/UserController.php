<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 024 24.09.17
 * Time: 16:09
 */

namespace AppBundle\Controller;
use AppBundle\Entity\Users;
use AppBundle\Form\UserRegistrationForm;
use AppBundle\Library\Vkontakte\VkApiHelper;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Security\LoginFormAuthenticator;


/**
 * Class UserController
 * @package AppBundle\Controller
 */
class UserController extends Controller
{
    /**
     * @Route("/register", name="user_register")
     */
    public function registerAction(Request $request, LoginFormAuthenticator $authenticator){

        $form = $this->createForm(UserRegistrationForm::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            $date = new \DateTime('now');
            $salt = md5($user->getEmail() . $user->getPassword());
            $user->setSalt($salt);
            $user->setJoinDate($date);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Добро пожаловать,' . $user->getEmail());

            return $this->get('security.authentication.guard_handler')
                        ->authenticateUserAndHandleSuccess(
                            $user,
                            $request,
                            $authenticator,
                            'main'
                            );//$this->redirectToRoute('homepage');
        }
        return$this->render('user/register.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/test/{method}")
     */
    public function testAction($method){
        // test options
        $token ='08229b3fc325fef6701d02695f5351e386d226d18fb152d26165dd2165922f334ff3f6dbb1d16728a7e44';

        $group = new VkApiHelper();
        //$query = $group->setMethod('groups')
        //        ->setMethodAction('create')
        //        ->set_access_token($token)
        //        ->set_title('Mяу')
        //        ->set_description('Милые котики')
        //        ->prepareQuery();
        $query = $group->setMethod('groups')
            ->setMethodAction('get')
            ->set_user_id(147437528)
            ->set_access_token($token)
            ->prepareQuery();
        $result = $group->execute($query);
        var_dump($result);
    }
}