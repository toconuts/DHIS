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
        
        // outbreak 01
        $outbreak1 = $this->createOutbreak(
                    52,
                    2011,
                    new \DateTime('2011-12-31'), 
                    $this->getReference('PMH'),
                    $this->getReference('A&E@PMH'),
                    $this->getReference('S4O_SYMPTOM01'),
                    'user1',
                    new \DateTime('2011-12-31')
                );
        
        // outbreak 02
        $outbreak2 = $this->createOutbreak(
                    1,
                    2012,
                    new \DateTime('2012-01-07'), 
                    $this->getReference('PORTSMOUTH'),
                    $this->getReference('PORTSMOUTH@PORTSMOUTH'),
                    $this->getReference('S4O_SYMPTOM02'),
                    'user2',
                    new \DateTime('2012-01-07')
                );
        
        $this->manager->flush();
        
        $this->addReference('OUT1', $outbreak1);
        $this->addReference('OUT2', $outbreak2);
        
    }
    
    protected function createOutbreak(
            $weekOfYear, $year, $date, $sentinelSite, $clinic, 
            $syndrome, $reportedBy, $reportedAt)
    {
        $out = new Outbreak();
        $out->setWeekOfYear($weekOfYear);
        $out->setYear($year);
        $out->setWeekEnd($date);
        $out->setSentinelSite($sentinelSite);
        $out->setClinic($clinic);
        $out->setSyndrome($syndrome);
        $out->setReportedBy($reportedBy);
        $out->setReportedAt($reportedAt);
        $this->manager->persist($out);
        return $out;
    }
    
    /**
     * @InheritDoc
     */
    public function getOrder()
    {
        return 7;
    }
}
