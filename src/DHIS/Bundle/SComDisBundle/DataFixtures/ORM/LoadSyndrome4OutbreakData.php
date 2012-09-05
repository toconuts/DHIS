<?php

namespace DHIS\Bundle\SComDisBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DHIS\Bundle\SComDisBundle\Entity\Syndrome4Outbreak;

/**
 * LoadSyndrome4SurveillanceData class for Doctrine Fixtures.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class LoadSyndrome4OutbreakData extends AbstractFixture implements OrderedFixtureInterface
{
    private $manager;
    
    /**
     * @InheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        
        // Gastroenteritis
        $symptom01 = $this->createSyndrome4OutbreakSite(1, 'Gastroenteritis', 1);
        
        // Undifferentiated Fever
        $symptom02 = $this->createSyndrome4OutbreakSite(2, 'Undifferentiated Fever', 2);
        
        $this->manager->flush();
        
        $this->addReference('S4O_SYMPTOM01', $symptom01);
        $this->addReference('S4O_SYMPTOM02', $symptom02);
        
    }
    
    protected function createSyndrome4OutbreakSite($id, $name, $displayId) {
        $so = new Syndrome4Outbreak();
        $so->setId($id);
        $so->setName($name);
        $so->setDisplayId($displayId);
        $this->manager->persist($so);
        return $so;
    }
    
    /**
     * @InheritDoc
     */
    public function getOrder()
    {
        return 4;
    }
}
