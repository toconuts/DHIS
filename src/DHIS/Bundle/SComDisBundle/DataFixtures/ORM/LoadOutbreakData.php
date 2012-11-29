<?php

namespace DHIS\Bundle\SComDisBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DHIS\Bundle\SComDisBundle\Entity\Outbreak;

/**
 * LoadOutbreakData class for Doctrine Fixtures.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class LoadOutbreakData extends AbstractFixture implements OrderedFixtureInterface
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
                    $this->getReference('S4O_SYMPTOM01'),
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
                    $this->getReference('S4O_SYMPTOM01'),
                    'user2',
                    new \DateTime('2012-01-07')
                );
        
        $this->manager->flush();
        
        $this->addReference('OUTBREAK1', $sur1);
        $this->addReference('OUTBREAK2', $sur2);
        
    }
    
    protected function createSurveillance(
            $weekOfYear, $year, $date, $sentinelSite, $clinic, $syndrome,
            $reportedBy, $reportedAt, $receivedBy = null, $receivedAt = null
            ) 
    {
        $outbreak = new Outbreak();
        $outbreak->setWeekOfYear($weekOfYear);
        $outbreak->setYear($year);
        $outbreak->setWeekEnd($date);
        $outbreak->setSentinelSite($sentinelSite);
        $outbreak->setClinic($clinic);
        $outbreak->setSyndrome($syndrome);
        $outbreak->setReportedBy($reportedBy);
        $outbreak->setReportedAt($reportedAt);
//        $sur->setReceivedBy($receivedBy);
//        $sur->setReceivedAt($receivedAt);
        $this->manager->persist($outbreak);
        return $outbreak;
    }
    
    /**
     * @InheritDoc
     */
    public function getOrder()
    {
        return 7;
    }
}
