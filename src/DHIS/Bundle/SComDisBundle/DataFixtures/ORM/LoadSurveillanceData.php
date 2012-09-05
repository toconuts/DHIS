<?php

namespace DHIS\Bundle\SComDisBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DHIS\Bundle\SComDisBundle\Entity\Surveillance;

/**
 * LoadSurveillanceData class for Doctrine Fixtures.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class LoadSurveillanceData extends AbstractFixture implements OrderedFixtureInterface
{
    private $manager;
    
    /**
     * @InheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        
        // surveillance 01
        $sur1 = $this->createSurveillance(
                    new \DateTime('2011-12-31'), 
                    $this->getReference('PMH'),
                    $this->getReference('A&E@PMH'),
                    'user1',
                    new \DateTime('2011-12-31')
                );
        
        // surveillance 02
        $sur2 = $this->createSurveillance(
                    new \DateTime('2012-01-07'), 
                    $this->getReference('PORTSMOUTH'),
                    $this->getReference('PORTSMOUTH@PORTSMOUTH'),
                    'user2',
                    new \DateTime('2012-01-07')
                );
        
        $this->manager->flush();
        
        $this->addReference('SUR1', $sur1);
        $this->addReference('SUR2', $sur2);
        
    }
    
    protected function createSurveillance(
            $date, $sentinelSite, $clinic, $reportedBy, $reportedAt
            ) 
    {
        $sur = new Surveillance();
        $sur->setWeekEnd($date);
        $sur->setSentinelSite($sentinelSite);
        $sur->setClinic($clinic);
        $sur->setReportedBy($reportedBy);
        $sur->setReportedAt($reportedAt);
        $this->manager->persist($sur);
        return $sur;
    }
    
    /**
     * @InheritDoc
     */
    public function getOrder()
    {
        return 5;
    }
}
