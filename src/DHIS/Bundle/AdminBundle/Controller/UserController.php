<?php

namespace DHIS\Bundle\AdminBundle\Controller;

use DHIS\Bundle\CommonBundle\Controller\AppController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\Security\Core\SecurityContext;
use JMS\SecurityExtraBundle\Annotation\Secure;

/**
 * UserController for Admin site.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @Route("/admin/user")
 */
class UserController extends AppController
{
    /**
     * @Route("/", name="admin_user")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
    
    /**
     * @Route("/{id}", name="admin_user_show", requirements={"id" = "\d+"})
     * @Template()
     */
    public function showAction(Request $request, $id)
    {
        return array();
    }
    
    /**
     * @Route("/new", name="admin_user_new")
     * @Template()
     */
    public function newAction()
    {
        return array();
    }
}
