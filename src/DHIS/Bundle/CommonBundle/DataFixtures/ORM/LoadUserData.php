<?php

namespace DHIS\Bundle\CommonBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DHIS\Bundle\CommonBundle\Entity\User;

/**
 * LoadUserData class for Doctrine Fixtures.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 *
 */
class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    private $manager;
    /**
     * @InheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        
        // Admin
        $userAdmin = $this->createUser("admin", "Ad Min", "adminpass", "admin@example.com", array(
            $this->getReference('groupAdmin'),
        ));
        
        // SuperAdmin
        $userSuperAdmin = $this->createUser("sadmin", "Super Admin", "adminpass", "sadmin@example.com", array(
            $this->getReference('groupSuperAdmin'),
        ));
        
        // Default User
        $userDefaultUser = $this->createUser("user", "Default User", "userpass", "user@example.com", array(
            $this->getReference('groupDefaultUser'),
        ));
        
        // All Product User
        $userAllProduct = $this->createUser("userallprod", "User AllProd", "userpass", "userallprod@example.com", array(
            $this->getReference('groupDefaultUser'),
            $this->getReference('groupAllProduct'),
        ));
        
        // OpenMRS User
        $userOpenMRS = $this->createUser("useropenmrs", "User OpenMRS", "userpass", "useropenmrs@example.com", array(
            $this->getReference('groupDefaultUser'),
            $this->getReference('groupOpenMRS'),
        ));
        
        // Scomdis User
        $userSComDis = $this->createUser("userscomdis", "User SComDis", "userpass", "userscomdis@example.com", array(
            $this->getReference('groupDefaultUser'),
            $this->getReference('groupSComDis'),
        ));
        
        // PM1 User
        $userPM1 = $this->createUser("userpm1", "User PM1", "userpass", "userpm1@example.com", array(
            $this->getReference('groupDefaultUser'),
            $this->getReference('groupPM1'),
        ));
        
        // EyeBase User
        $userEyeBase = $this->createUser("usereyebase", "User EyeBase", "userpass", "usereyebase@example.com", array(
            $this->getReference('groupDefaultUser'),
            $this->getReference('groupEyeBase'),
        ));
        
        // User in acount locked
        $userLocked = $this->createUser("userlocked", "User Locked", "userpass", "userlocked@example.com", array(
            $this->getReference('groupDefaultUser'),),
            true, true);
        
        // User in not enabled
        $userNotEnabled = $this->createUser("userdisabled", "User Disabled","userpass", "usernotenabled@example.com", array(
            $this->getReference('groupDefaultUser'),),
            false, false);
        
        // User in not enabled and acount locked
        $userLockedAndNotEnabled = $this->createUser("userlockedanddisabled", "User Locked and Disabled", "userpass", "userlockedandnotenabled@example.com", array(
            $this->getReference('groupDefaultUser'),),
            true, false);
        
        $this->manager->flush();
        
        $this->addReference('userAdmin',                $userAdmin);
        $this->addReference('userSuperAdmin',           $userSuperAdmin);
        $this->addReference('userDefaultUser',          $userDefaultUser);
        $this->addReference('userAllProduct',           $userAllProduct);
        $this->addReference('userOpenMRS',              $userOpenMRS);
        $this->addReference('userSComDis',              $userSComDis);
        $this->addReference('userPM1',                  $userPM1);
        $this->addReference('userEyeBase',              $userEyeBase);
        $this->addReference('userLocked',               $userLocked);
        $this->addReference('userNotEnabled',           $userNotEnabled);
        $this->addReference('userLockedAndNotEnabled',  $userLockedAndNotEnabled);
    }
    
    public function createUser($username, $displayname, $password, $email, array $groups, 
            $isLock = false, $isActive = true)
    {
        $user = new User();
        $user->setUsername($username);
        $user->setDisplayname($displayname);
        $user->setRawPassword($password);
        $user->setEmail($email);
        foreach ($groups as $group) {
            $user->addGroup($group);
        }
        
        if ($isLock) {
            $user->setIsLock(true);
        }
        
        if (!$isActive) {
            $user->setIsActive(false);
        }
        
        $this->manager->persist($user);
        return $user;
    }
    
    /**
     * @InheritDoc
     */
    public function getOrder()
    {
        return 2;
    }
}
