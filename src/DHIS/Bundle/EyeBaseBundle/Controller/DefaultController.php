<?php

namespace DHIS\Bundle\EyeBaseBundle\Controller;

use DHIS\Bundle\CommonBundle\Controller\AppController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\Security\Core\SecurityContext;
use JMS\SecurityExtraBundle\Annotation\Secure;

/**
 * @Route("/eyebase") 
 * 
 */
class DefaultController extends AppController
{
    /**
     * @Route("/", name="eyebase")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
