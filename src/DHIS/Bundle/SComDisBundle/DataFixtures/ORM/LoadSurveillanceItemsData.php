<?php

namespace DHIS\Bundle\SComDisBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DHIS\Bundle\SComDisBundle\Entity\SurveillanceItems;

/**
 * LoadSurveillanceItemsData class for Doctrine Fixtures.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class LoadSurveillanceItemsData extends AbstractFixture implements OrderedFixtureInterface
{
    private $manager;
    
    /**
     * @InheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        
        // surveillanceItems for surveilance 01
        $this->createSurveillanceItems($this->getReference('SUR1'), $this->getReference('S4S_SYMPTOM01'), 0, 0, 0, 0, 0, 0, 0);
        $this->createSurveillanceItems($this->getReference('SUR1'), $this->getReference('S4S_SYMPTOM02'), 0, 1, 0, 1, 0, 1, 0);
        $this->createSurveillanceItems($this->getReference('SUR1'), $this->getReference('S4S_SYMPTOM03'), 1, 0, 1, 0, 1, 0, 1);
        $this->createSurveillanceItems($this->getReference('SUR1'), $this->getReference('S4S_SYMPTOM04'), 0, 0, 1, 1, 0, 0, 1);
        $this->createSurveillanceItems($this->getReference('SUR1'), $this->getReference('S4S_SYMPTOM05'), 1, 1, 0, 0, 1, 1, 0);
        $this->createSurveillanceItems($this->getReference('SUR1'), $this->getReference('S4S_SYMPTOM06'), 0, 0, 0, 1, 1, 1, 0);
        $this->createSurveillanceItems($this->getReference('SUR1'), $this->getReference('S4S_SYMPTOM07'), 1, 1, 1, 0, 0, 0, 1);
        $this->createSurveillanceItems($this->getReference('SUR1'), $this->getReference('S4S_SYMPTOM08'), 0, 0, 0, 0, 1, 1, 1);
        $this->createSurveillanceItems($this->getReference('SUR1'), $this->getReference('S4S_SYMPTOM09'), 1, 1, 1, 1, 0, 0, 0);
        $this->createSurveillanceItems($this->getReference('SUR1'), $this->getReference('S4S_SYMPTOM10'), 0, 0, 0, 0, 0, 1, 1);
        $this->createSurveillanceItems($this->getReference('SUR1'), $this->getReference('S4S_SYMPTOM11'), 1, 1, 1, 1, 1, 0, 0);
        $this->createSurveillanceItems($this->getReference('SUR1'), $this->getReference('S4S_SYMPTOM12'), 0, 0, 0, 0, 0, 0, 1); 

        // surveillanceItems for surveilance 02
        $this->createSurveillanceItems($this->getReference('SUR2'), $this->getReference('S4S_SYMPTOM01'), 1, 1, 1, 1, 1, 1, 0);
        $this->createSurveillanceItems($this->getReference('SUR2'), $this->getReference('S4S_SYMPTOM02'), 0, 0, 0, 0, 0, 0, 0);
        $this->createSurveillanceItems($this->getReference('SUR2'), $this->getReference('S4S_SYMPTOM03'), 0, 1, 0, 1, 0, 1, 0);
        $this->createSurveillanceItems($this->getReference('SUR2'), $this->getReference('S4S_SYMPTOM04'), 1, 0, 1, 0, 1, 0, 1);
        $this->createSurveillanceItems($this->getReference('SUR2'), $this->getReference('S4S_SYMPTOM05'), 0, 0, 1, 1, 0, 0, 1);
        $this->createSurveillanceItems($this->getReference('SUR2'), $this->getReference('S4S_SYMPTOM06'), 1, 1, 0, 0, 1, 1, 0);
        $this->createSurveillanceItems($this->getReference('SUR2'), $this->getReference('S4S_SYMPTOM07'), 0, 0, 0, 1, 1, 1, 0);
        $this->createSurveillanceItems($this->getReference('SUR2'), $this->getReference('S4S_SYMPTOM08'), 1, 1, 1, 0, 0, 0, 1);
        $this->createSurveillanceItems($this->getReference('SUR2'), $this->getReference('S4S_SYMPTOM09'), 0, 0, 0, 0, 1, 1, 1);
        $this->createSurveillanceItems($this->getReference('SUR2'), $this->getReference('S4S_SYMPTOM10'), 1, 1, 1, 1, 0, 0, 0);
        $this->createSurveillanceItems($this->getReference('SUR2'), $this->getReference('S4S_SYMPTOM11'), 0, 0, 0, 0, 0, 1, 1);
        $this->createSurveillanceItems($this->getReference('SUR2'), $this->getReference('S4S_SYMPTOM12'), 1, 1, 1, 1, 1, 0, 0);        
        $this->manager->flush();
        
    }
    
    protected function createSurveillanceItems(
            $surveillance, $syndrome, 
            $sunday, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $referrals = null
            ) 
    {
        $sur = new SurveillanceItems();
        $sur->setSurveillance($surveillance);
        $sur->setSyndrome($syndrome);
        $sur->setSunday($sunday);
        $sur->setMonday($monday);
        $sur->setTuesday($tuesday);
        $sur->setWednesday($wednesday);
        $sur->setThursday($thursday);
        $sur->setFriday($friday);
        $sur->setSaturday($saturday);
        if ($referrals)
            $sur->setReferrals ($referrals);
        
        $this->manager->persist($sur);
        return $sur;
    }
    
    /**
     * @InheritDoc
     */
    public function getOrder()
    {
        return 7;
    }
}
