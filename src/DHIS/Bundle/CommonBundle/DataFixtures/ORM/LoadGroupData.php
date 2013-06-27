<?php

namespace DHIS\Bundle\CommonBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DHIS\Bundle\CommonBundle\Entity\Group;

/**
 * LoadGroupData class for Doctrine Fixtures.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class LoadGroupData extends AbstractFixture implements OrderedFixtureInterface
{
    private $manager;
    
    /**
     * @InheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        
        // Admins
        $groupAdmin = $this->createGroup("Administrators", "ROLE_ADMIN");
        
        // SuperAdmin
        $groupSuperAdmin = $this->createGroup("Super Administrators", "ROLE_SUPER_ADMIN");
        
        // Default Users
        $groupDefaultUser = $this->createGroup("Default Users", "ROLE_USER");
        
        // All Products Users
        $groupAllProduct = $this->createGroup("All Product Users", "ROLE_ALLPRODUCTS_USER");
        
        // OpenMRS Users
        $groupOpenMRS = $this->createGroup("OpenMRS Users", "ROLE_OPENMRSD_USER");
        
        // SComdis Users
        $groupSComDis = $this->createGroup("SComDis Users", "ROLE_SCOMDIS_USER");
        
        // SComdis Admin
        $groupSComDisAdmin = $this->createGroup("SComDis Admin", "ROLE_SCOMDIS_ADMIN");
        
        // PM.1 Users
        $groupPM1 = $this->createGroup("PM1 Users", "ROLE_PM1_USER");
        
        // EyeBase Users
        $groupEyeBase = $this->createGroup("EyeBase Users", "ROLE_EYEBASE_USER");
                
        $this->manager->flush();
        
        $this->addReference('groupAdmin',           $groupAdmin);
        $this->addReference('groupSuperAdmin',      $groupSuperAdmin);
        $this->addReference('groupDefaultUser',     $groupDefaultUser);
        $this->addReference('groupAllProduct',      $groupAllProduct);
        $this->addReference('groupOpenMRS',         $groupOpenMRS);
        $this->addReference('groupSComDis',         $groupSComDis);
        $this->addReference('groupSComDisAdmin',    $groupSComDisAdmin);
        $this->addReference('groupPM1',             $groupPM1);
        $this->addReference('groupEyeBase',         $groupEyeBase);
    }
    
    protected function createGroup($name, $role) {
        $group = new Group();
        $group->setName($name);
        $group->setRole($role);
        $this->manager->persist($group);
        return $group;
    }
    
    /**
     * @InheritDoc
     */
    public function getOrder()
    {
        return 1;
    }
}
