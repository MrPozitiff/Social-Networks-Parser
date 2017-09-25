<?php

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Security("is_granted('ROLE_ADMIN')")
 * @Route("/admin", name="admin_panel")
 */
class ParserAdminController extends Controller
{
    /**
     * @param $name
     * @return Response
     * @Route("/{name}")
     */
    public function indexAction($name)
    {
        return $this->render('admin/admin_panel.html.twig', ['name' => $name]);
    }
}
