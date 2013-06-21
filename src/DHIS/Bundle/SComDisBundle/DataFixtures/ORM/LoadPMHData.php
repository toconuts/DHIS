<?php

namespace DHIS\Bundle\SComDisBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DHIS\Bundle\SComDisBundle\Entity\PMH;

/**
 * LoadPMHData class for Doctrine Fixtures.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class LoadPMHData extends AbstractFixture implements OrderedFixtureInterface
{
    private $manager;
    
    /**
     * @InheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        
        // A&E
        $this->createPMH($this->getReference('A&E@PMH'));
        
        // IMRAY WARD
        $this->createPMH($this->getReference('IMRAY WARD@PMH'));
        
        // GLOVER WARD
        $this->createPMH($this->getReference('GLOVER WARD@PMH'));
        
        // WINSTON WARD
        $this->createPMH($this->getReference('WINSTON WARD@PMH'));
        
        
        $this->manager->flush();
        
    }
    
    protected function createPMH($clinic) {
        $pmh = new PMH();
        $pmh->setClinic($clinic);
        $this->manager->persist($pmh);
        return $pmh;
    }
    
    /**
     * @InheritDoc
     */
    public function getOrder()
    {
        return 11;
    }
}
