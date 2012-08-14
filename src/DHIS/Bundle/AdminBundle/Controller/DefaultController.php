<?php

namespace DHIS\Bundle\AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
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
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
