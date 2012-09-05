<?php

namespace DHIS\Bundle\SComDisBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DHIS\Bundle\SComDisBundle\Entity\SentinelSite;

/**
 * LoadSentinelSiteData class for Doctrine Fixtures.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class LoadSentinelSiteData extends AbstractFixture implements OrderedFixtureInterface
{
    private $manager;
    
    /**
     * @InheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        
        // PMH
        $pmh = $this->createSentinelSite(8, 'PMH');
        
        // POTSMOUTH
        $portsmouth = $this->createSentinelSite(6, 'PORTSMOUTH');
        
        $this->manager->flush();
        
        $this->addReference('PMH', $pmh);
        $this->addReference('PORTSMOUTH', $portsmouth);
        
    }
    
    protected function createSentinelSite($id, $name) {
        $ss = new SentinelSite();
        $ss->setId($id);
        $ss->setName($name);
        $this->manager->persist($ss);
        return $ss;
    }
    
    /**
     * @InheritDoc
     */
    public function getOrder()
    {
        return 1;
    }
}
