<?php

namespace DHIS\Bundle\SComDisBundle\Controller;

use DHIS\Bundle\CommonBundle\Controller\AppController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\Security\Core\SecurityContext;
use JMS\SecurityExtraBundle\Annotation\Secure;

/**
 * @Route("/scomdis") 
 * 
 */
class DefaultController extends AppController
{
    /**
     * @Route("/", name="scomdis")
     * @Secure(roles="ROLE_SCOMDIS")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
