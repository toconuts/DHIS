<?php

namespace DHIS\Bundle\AdminBundle\Controller;

use DHIS\Bundle\CommonBundle\Controller\AppController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\Security\Core\SecurityContext;
use JMS\SecurityExtraBundle\Annotation\Secure;

/**
 * DefaultController for Admin site.
 * 
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @Route("/admin") 
 */
class DefaultController extends AppController
{
    /**
     * @Route("/", name="admin")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
