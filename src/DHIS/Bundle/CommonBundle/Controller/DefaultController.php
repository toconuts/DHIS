<?php

namespace DHIS\Bundle\CommonBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\SecurityContext;
use JMS\SecurityExtraBundle\Annotation\Secure;  

/**
 * DefaultController.
 * 
 * @author Natsuki Hara <tocontus@gmail.com>
 * 
 * @Route("/common") 
 */
class DefaultController extends AppController
{
    /**
     * @Route("/", name="common_index")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
