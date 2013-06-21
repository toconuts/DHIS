<?php

namespace DHIS\Bundle\SComDisBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DHIS\Bundle\SComDisBundle\Entity\Phase;

/**
 * LoadPhaseData class for Doctrine Fixtures.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class LoadPhaseData extends AbstractFixture implements OrderedFixtureInterface
{
    private $manager;
    
    /**
     * @InheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        
        // Phases
        $this->createPhase(1, -999, '#FFFFFF');
        $this->createPhase(2, 0.5, 'yellow');
        $this->createPhase(3, 1, '#FF9900');
        $this->createPhase(4, 1.645, '#FF9999');
        $this->createPhase(5, 2, '#CC0000');

        $this->manager->flush();
        
    }
    
    protected function createPhase($id, $threshold, $color) {
        $phase = new Phase();
        $phase->setId($id);
        $phase->setThreshold($threshold);
        $phase->setColor($color);
        
        $this->manager->persist($phase);
        return $phase;
    }
    
    /**
     * @InheritDoc
     */
    public function getOrder()
    {
        return 12;
    }
}
