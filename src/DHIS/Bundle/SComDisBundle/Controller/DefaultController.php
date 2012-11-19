<?php

namespace DHIS\Bundle\SComDisBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

/**
 * @Route("/scomdis") 
 * 
 */
class DefaultController extends AppController
{
    /**
     * @todo scomdis admin display information for user.
     * 
     * @Route("/", name="scomdis")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
