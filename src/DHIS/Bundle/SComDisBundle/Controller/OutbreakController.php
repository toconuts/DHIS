<?php

namespace DHIS\Bundle\SComDisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use DHIS\Bundle\SComDisBundle\Entity\Outbreak;
use DHIS\Bundle\SComDisBundle\Entity\OutbreakRepository;

/**
 * OutbreakController fot SComDis site.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @Route("/scomdis/outbreak")
 *
 */
class OutbreakController extends AppController
{
    /**
     * @Route("/", name="scomdis_surveillance")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        
    }
}
