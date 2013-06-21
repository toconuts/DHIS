<?php

namespace DHIS\Bundle\SComDisBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DHIS\Bundle\SComDisBundle\Entity\District;

/**
 * LoadDestrictData class for Doctrine Fixtures.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class LoadDistrictData extends AbstractFixture implements OrderedFixtureInterface
{
    private $manager;
    
    /**
     * @InheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        
        // MARIGOT
        $marigot = $this->createDistrict(1, 'MARIGOT', 2637+1233+2042+1346+1052);
        
        // GRAND BAY
        $grandbay = $this->createDistrict(2, 'GRAND BAY', 3003+827+753+581+762);

        // ST JOSEPH
        $stjoseph = $this->createDistrict(3, 'ST JOSEPH', 2243+2173+707+704+381);
        
        // LA PLAINE
        $laplaine = $this->createDistrict(4, 'LA PLAINE', 1048+629+851+182+673);
        
        // CASTLE BRUCE
        $castlebruce = $this->createDistrict(5, 'CASTLE BRUCE', 1222+506+533+942+8333);
        
        // POTSMOUTH
        $portsmouth = $this->createDistrict(6, 'PORTSMOUTH', 4062+840+1210+665+460+705+671+720);
        
        // ROSEAU
        $roseau = $this->createDistrict(7, 'ROSEAU', 14967+8674+5992+3049);
        
        $this->manager->flush();
        
        $this->addReference('DIST_MARIGOT', $marigot);
        $this->addReference('DIST_GRANDBAY', $grandbay);
        $this->addReference('DIST_STJOSEPH', $stjoseph);
        $this->addReference('DIST_LAPLAINE', $laplaine);
        $this->addReference('DIST_CASTLEBRUCE', $castlebruce);
        $this->addReference('DIST_PORTSMOUTH', $portsmouth);
        $this->addReference('DIST_ROSEAU', $roseau);

    }
    
    protected function createDistrict($id, $name, $population) {
        $district = new District();
        $district->setId($id);
        $district->setName($name);
        $district->setPopulation($population);
        $this->manager->persist($district);
        return $district;
    }
    
    /**
     * @InheritDoc
     */
    public function getOrder()
    {
        return 2;
    }
}
