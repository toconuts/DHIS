<?php

namespace DHIS\Bundle\SComDisBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DHIS\Bundle\SComDisBundle\Entity\Clinic;

/**
 * LoadClinicData class for Doctrine Fixtures.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class LoadClinicData extends AbstractFixture implements OrderedFixtureInterface
{
    private $manager;
    
    /**
     * @InheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        
        // A&E@PMH
        $pmh = $this->createClinic(802, 'A&E', $this->getReference('PMH'));
        
        // PORTSMOUTH@PORTSMOUTH
        $portsmouth = $this->createClinic(601, 'PORTSMOUTH', $this->getReference('PORTSMOUTH'));
        
        $this->manager->flush();
        
        $this->addReference('A&E@PMH', $pmh);
        $this->addReference('PORTSMOUTH@PORTSMOUTH', $portsmouth);
        
    }
    
    protected function createClinic($id, $name, $sentinel) {
        $clinic = new Clinic();
        $clinic->setId($id);
        $clinic->setName($name);
        $clinic->setSentinelSite($sentinel);
        $this->manager->persist($clinic);
        return $clinic;
    }
    
    /**
     * @InheritDoc
     */
    public function getOrder()
    {
        return 2;
    }
}
