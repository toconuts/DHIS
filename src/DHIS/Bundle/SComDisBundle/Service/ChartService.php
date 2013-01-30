<?php

namespace DHIS\Bundle\SComDisBundle\Service;

use Symfony\Bridge\Doctrine\RegistryInterface;
use DHIS\Bundle\SComDisBundle\Entity\SurveillanceRepository;
use DHIS\Bundle\SComDisBundle\Entity\Surveillance;
/**
 * Chart Service for Syndromic Surveillance
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class ChartService
{
    /**
     * @var type RegistryInterface
     */
    private $managerRegistry;
    
    /**
     * @var string 
     */
//    private $weekOfYear;
    
    /**
     * @var DateTime
     */
//    private $weekend;
    
    /**
     * @var string
     */
//    private $totalSites;
    
    /**
     * @var int
     */
//    private $reportSites;
    
    /**
     * @var array 
     */
//    private $syndrome;

    /**
     * Constructor.
     * 
     * @param RegistryInterface $managerRegistry 
     */
    public function __construct(RegistryInterface $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
//        $manager = $this->managerRegistry->getEntityManager('scomdis');
//        $syndromes = $manager->getRepository('DHISSComDisBundle:Syndrome4Surveillance')->findAll();
//        foreach ($syndromes as $syndrome) {
//            $this->syndrome[$syndrome->getId()] = 0;
//        }
    }
    
    public function createTrendChart()  // @todo arguments
    {
        //return 'http://chart.apis.google.com/chart?chs=600x400&chd=t:78.0,32.0,84.0&cht=lc';
        return 'http://chart.apis.google.com/chart?chs=600x450&chd=t:78.0,32.0,84.0&cht=lc';
    }
}
