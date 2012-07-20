<?php

namespace DHIS\Bundle\PM1Bundle\Controller;

use DHIS\Bundle\CommonBundle\Controller\AppController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\Security\Core\SecurityContext;
use JMS\SecurityExtraBundle\Annotation\Secure;

/**
 * @Route("/pm1") 
 * 
 */
class DefaultController extends AppController
{
    /**
     * @Route("/", name="pm1")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
