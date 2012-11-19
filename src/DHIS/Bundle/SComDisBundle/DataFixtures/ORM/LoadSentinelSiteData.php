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
        
        // MARIGOT
        $marigot = $this->createSentinelSite(1, 'MARIGOT');
        
        // GRAND BAY
        $grandbay = $this->createSentinelSite(2, 'GRAND BAY');

        // ST JOSEPH
        $stjoseph = $this->createSentinelSite(3, 'ST JOSEPH');
        
        // LA PLAINE
        $laplaine = $this->createSentinelSite(4, 'LA PLAINE');
        
        // CASTLE BRUCE
        $castlebruce = $this->createSentinelSite(5, 'CASTLE BRUCE');
        
        // POTSMOUTH
        $portsmouth = $this->createSentinelSite(6, 'PORTSMOUTH');
        
        // ROSEAU
        $roseau = $this->createSentinelSite(7, 'ROSEAU');
        
        // PMH
        $pmh = $this->createSentinelSite(8, 'PMH');
        
        // ROSS UNIVERSITY
        $rossuniversity = $this->createSentinelSite(9, 'ROSS University');
        
        $this->manager->flush();
        
        $this->addReference('MARIGOT', $marigot);
        $this->addReference('GRANDBAY', $grandbay);
        $this->addReference('STJOSEPH', $stjoseph);
        $this->addReference('LAPLAINE', $laplaine);
        $this->addReference('CASTLEBRUCE', $castlebruce);
        $this->addReference('PORTSMOUTH', $portsmouth);
        $this->addReference('ROSEAU', $roseau);
        $this->addReference('PMH', $pmh);
        $this->addReference('ROSSUNIVERSITY', $rossuniversity);

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
