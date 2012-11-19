<?php

namespace DHIS\Bundle\SComDisBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DHIS\Bundle\SComDisBundle\Entity\Syndrome4Surveillance;

/**
 * LoadSyndrome4SurveillanceData class for Doctrine Fixtures.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class LoadSyndrome4SurveillanceData extends AbstractFixture implements OrderedFixtureInterface
{
    private $manager;
    
    /**
     * @InheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        
        // Gastroenteritis < 5
        $symptom01 = $this->createSyndrome4SurveillanceSite(1, 'Gastroenteritis < 5', 1);
        
        // Gastroenteritis >= 5
        $symptom02 = $this->createSyndrome4SurveillanceSite(2, 'Gastroenteritis >= 5', 2);
        
        // Undifferentiated Fever < 5
        $symptom03 = $this->createSyndrome4SurveillanceSite(3, 'Undifferentiated Fever < 5', 3);
        
        // Undifferentiated Fever >= 5
        $symptom04 = $this->createSyndrome4SurveillanceSite(4, 'Undifferentiated Fever >= 5', 4);
        
        // Ferver & Neurological symptoms
        $symptom05 = $this->createSyndrome4SurveillanceSite(5, 'Ferver & Neurological symptoms', 5);
        
        // Ferver & Hemorrhagic symptoms
        $symptom06 = $this->createSyndrome4SurveillanceSite(6, 'Ferver & Hemorrhagic symptoms', 6);
        
        // ARI < 5
        $symptom07 = $this->createSyndrome4SurveillanceSite(7, 'Ferver & respiratory symptoms (ARI) < 5', 7);
        
        // ARI >= 5
        $symptom08 = $this->createSyndrome4SurveillanceSite(8, 'Ferver & respiratory symptoms (ARI) >= 5', 8);
        
        // Skin Rash
        $symptom09 = $this->createSyndrome4SurveillanceSite(9, 'Skin Rash', 9);
        
        // Conjunctivitis
        $symptom10 = $this->createSyndrome4SurveillanceSite(10, 'Conjunctivitis', 10);
        
        // Genital discharge
        $symptom11 = $this->createSyndrome4SurveillanceSite(11, 'Genital discharge', 11);
        
        // Genital ulcer
        $symptom12 = $this->createSyndrome4SurveillanceSite(12, 'Genital ulcer', 12);
        
        $this->manager->flush();
        
        $this->addReference('S4S_SYMPTOM01', $symptom01);
        $this->addReference('S4S_SYMPTOM02', $symptom02);
        $this->addReference('S4S_SYMPTOM03', $symptom03);
        $this->addReference('S4S_SYMPTOM04', $symptom04);
        $this->addReference('S4S_SYMPTOM05', $symptom05);
        $this->addReference('S4S_SYMPTOM06', $symptom06);
        $this->addReference('S4S_SYMPTOM07', $symptom07);
        $this->addReference('S4S_SYMPTOM08', $symptom08);
        $this->addReference('S4S_SYMPTOM09', $symptom09);
        $this->addReference('S4S_SYMPTOM10', $symptom10);
        $this->addReference('S4S_SYMPTOM11', $symptom11);
        $this->addReference('S4S_SYMPTOM12', $symptom12);
    }
    
    protected function createSyndrome4SurveillanceSite($id, $name, $displayId) {
        $ss = new Syndrome4Surveillance();
        $ss->setId($id);
        $ss->setName($name);
        $ss->setDisplayId($displayId);
        $this->manager->persist($ss);
        return $ss;
    }
    
    /**
     * @InheritDoc
     */
    public function getOrder()
    {
        return 3;
    }
}
