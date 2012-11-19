<?php

namespace DHIS\Bundle\SComDisBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DHIS\Bundle\SComDisBundle\Entity\OutbreakItems;

/**
 * LoadOutbreakItemsData class for Doctrine Fixtures.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class LoadOutbreakItemsData extends AbstractFixture implements OrderedFixtureInterface
{
    private $manager;
    
    /**
     * @InheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        
        // outbreakItems for outbreak 01
        $this->createOutbreakItems($this->getReference('OUT1'), 0, 1,   0, 0, 0, 0, 0, 0, 0);
        $this->createOutbreakItems($this->getReference('OUT1'), 0, 2,   0, 1, 0, 1, 0, 1, 0);
        $this->createOutbreakItems($this->getReference('OUT1'), 1, 1,   1, 0, 1, 0, 1, 0, 1);
        $this->createOutbreakItems($this->getReference('OUT1'), 1, 2,   0, 0, 1, 1, 0, 0, 1);
        $this->createOutbreakItems($this->getReference('OUT1'), 2, 1,   1, 1, 0, 0, 1, 1, 0);
        $this->createOutbreakItems($this->getReference('OUT1'), 2, 2,   0, 0, 0, 1, 1, 1, 0);
        $this->createOutbreakItems($this->getReference('OUT1'), 3, 1,   1, 1, 1, 0, 0, 0, 1);
        $this->createOutbreakItems($this->getReference('OUT1'), 3, 2,   0, 0, 0, 0, 1, 1, 1);
        $this->createOutbreakItems($this->getReference('OUT1'), 4, 1,   1, 1, 1, 1, 0, 0, 0);
        $this->createOutbreakItems($this->getReference('OUT1'), 4, 2,   0, 0, 0, 0, 0, 1, 1);
        $this->createOutbreakItems($this->getReference('OUT1'), 5, 1,   1, 1, 1, 1, 1, 0, 0);
        $this->createOutbreakItems($this->getReference('OUT1'), 5, 2,   0, 0, 0, 0, 0, 0, 1); 
        $this->createOutbreakItems($this->getReference('OUT1'), 6, 1,   1, 1, 1, 1, 1, 1, 0);
        $this->createOutbreakItems($this->getReference('OUT1'), 6, 2,   0, 0, 0, 0, 0, 0, 0);
        
        // outbreakItems for outbreak 02
        $this->createOutbreakItems($this->getReference('OUT2'), 0, 1,   1, 1, 1, 1, 1, 1, 0);
        $this->createOutbreakItems($this->getReference('OUT2'), 0, 2,   0, 0, 0, 0, 0, 0, 0);
        $this->createOutbreakItems($this->getReference('OUT2'), 1, 1,   0, 0, 0, 0, 0, 0, 0);
        $this->createOutbreakItems($this->getReference('OUT2'), 1, 2,   0, 1, 0, 1, 0, 1, 0);
        $this->createOutbreakItems($this->getReference('OUT2'), 2, 1,   1, 0, 1, 0, 1, 0, 1);
        $this->createOutbreakItems($this->getReference('OUT2'), 2, 2,   0, 0, 1, 1, 0, 0, 1);
        $this->createOutbreakItems($this->getReference('OUT2'), 3, 1,   1, 1, 0, 0, 1, 1, 0);
        $this->createOutbreakItems($this->getReference('OUT2'), 3, 2,   0, 0, 0, 1, 1, 1, 0);
        $this->createOutbreakItems($this->getReference('OUT2'), 4, 1,   1, 1, 1, 0, 0, 0, 1);
        $this->createOutbreakItems($this->getReference('OUT2'), 4, 2,   0, 0, 0, 0, 1, 1, 1);
        $this->createOutbreakItems($this->getReference('OUT2'), 5, 1,   1, 1, 1, 1, 0, 0, 0);
        $this->createOutbreakItems($this->getReference('OUT2'), 5, 2,   0, 0, 0, 0, 0, 1, 1);
        $this->createOutbreakItems($this->getReference('OUT2'), 6, 1,   1, 1, 1, 1, 1, 0, 0);
        $this->createOutbreakItems($this->getReference('OUT2'), 6, 2,   0, 0, 0, 0, 0, 0, 1);
        
        $this->manager->flush();
        
    }
    
    protected function createOutbreakItems(
                $outbreak, $dayOfTheWeek, $sex,
                $ageGroup1, $ageGroup2, $ageGroup3, $ageGroup4, $ageGroup5, $ageGroup6, $ageGroup7
            ) 
    {
        $out = new OutbreakItems();
        $out->setOutbreak($outbreak);
        $out->setDayOfTheWeek($dayOfTheWeek);
        $out->setSex($sex);
        $out->setAgeGroup1($ageGroup1);
        $out->setAgeGroup2($ageGroup2);
        $out->setAgeGroup3($ageGroup3);
        $out->setAgeGroup4($ageGroup4);
        $out->setAgeGroup5($ageGroup5);
        $out->setAgeGroup6($ageGroup6);
        $out->setAgeGroup7($ageGroup7);
    
        $this->manager->persist($out);
        return $out;
    }
    
    /**
     * @InheritDoc
     */
    public function getOrder()
    {
        return 8;
    }
}
