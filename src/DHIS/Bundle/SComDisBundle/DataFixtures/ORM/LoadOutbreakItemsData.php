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
        $this->createOutbreakItems($this->getReference('OUT1'), 1, 1,   0, 0, 0, 0, 0, 0, 0);
        $this->createOutbreakItems($this->getReference('OUT1'), 1, 2,   0, 1, 0, 1, 0, 1, 0);
        $this->createOutbreakItems($this->getReference('OUT1'), 2, 1,   1, 0, 1, 0, 1, 0, 1);
        $this->createOutbreakItems($this->getReference('OUT1'), 2, 2,   0, 0, 1, 1, 0, 0, 1);
        $this->createOutbreakItems($this->getReference('OUT1'), 3, 1,   1, 1, 0, 0, 1, 1, 0);
        $this->createOutbreakItems($this->getReference('OUT1'), 3, 2,   0, 0, 0, 1, 1, 1, 0);
        $this->createOutbreakItems($this->getReference('OUT1'), 4, 1,   1, 1, 1, 0, 0, 0, 1);
        $this->createOutbreakItems($this->getReference('OUT1'), 4, 2,   0, 0, 0, 0, 1, 1, 1);
        $this->createOutbreakItems($this->getReference('OUT1'), 5, 1,   1, 1, 1, 1, 0, 0, 0);
        $this->createOutbreakItems($this->getReference('OUT1'), 5, 2,   0, 0, 0, 0, 0, 1, 1);
        $this->createOutbreakItems($this->getReference('OUT1'), 6, 1,   1, 1, 1, 1, 1, 0, 0);
        $this->createOutbreakItems($this->getReference('OUT1'), 6, 2,   0, 0, 0, 0, 0, 0, 1); 
        $this->createOutbreakItems($this->getReference('OUT1'), 7, 1,   1, 1, 1, 1, 1, 1, 0);
        $this->createOutbreakItems($this->getReference('OUT1'), 7, 2,   0, 0, 0, 0, 0, 0, 0);
        
        // outbreakItems for outbreak 02
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
        $this->createOutbreakItems($this->getReference('OUT2'), 7, 1,   1, 1, 1, 1, 1, 1, 0);
        $this->createOutbreakItems($this->getReference('OUT2'), 7, 2,   0, 0, 0, 0, 0, 0, 0);        
        
        $this->manager->flush();
        
    }
    
    protected function createOutbreakItems(
                $outbreak, $ageGroup, $sex,
                $sunday, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday
            ) 
    {
        $out = new OutbreakItems();
        $out->setOutbreak($outbreak);
        $out->setAgeGroup($ageGroup);
        $out->setSex($sex);
        $out->setSunday($sunday);
        $out->setMonday($monday);
        $out->setTuesday($tuesday);
        $out->setWednesday($wednesday);
        $out->setThursday($thursday);
        $out->setFriday($friday);
        $out->setSaturday($saturday);
    
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
