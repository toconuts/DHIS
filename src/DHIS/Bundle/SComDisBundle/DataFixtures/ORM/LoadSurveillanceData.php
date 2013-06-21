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
                    52,
                    2011,
                    new \DateTime('2011-12-31'), 
                    $this->getReference('PMH'),
                    $this->getReference('A&E@PMH'),
                    'user1',
                    new \DateTime('2011-12-31'),
                    '012345678901234567890123456789',
                    new \DateTime('2012-01-01')
                );
        
        // surveillance 02
        $sur2 = $this->createSurveillance(
                    1,
                    2012,
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
            $weekOfYear, $year, $date, $sentinelSite, $clinic, 
            $reportedBy, $reportedAt, $receivedBy = null, $receivedAt = null
            ) 
    {
        $sur = new Surveillance();
        $sur->setWeekOfYear($weekOfYear);
        $sur->setYear($year);
        $sur->setWeekEnd($date);
        $sur->setSentinelSite($sentinelSite);
        $sur->setClinic($clinic);
        $sur->setReportedBy($reportedBy);
        $sur->setReportedAt($reportedAt);
        $sur->setReceivedBy($receivedBy);
        $sur->setReceivedAt($receivedAt);
        $this->manager->persist($sur);
        return $sur;
    }
    
    /**
     * @InheritDoc
     */
    public function getOrder()
    {
        return 6;
    }
}
