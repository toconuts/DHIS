<?php

namespace DHIS\Bundle\SComDisBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DHIS\Bundle\SComDisBundle\Entity\OutbreakItems;

/**
 * LoadOutbreakItemsData class for Doctrine Fixtures.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class LoadOutbreakItemData extends AbstractFixture implements OrderedFixtureInterface
{
    private $manager;
    
    /**
     * @InheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
  
        /*
        $outbreak = new OutbreakItems;
        $outbreak->setOutbreak($this->getReference('OUTBREAK1'));
        $outbreak->setDayOfTheWeek(0);
        $outbreak->setAgeGroup1F(1);
        $outbreak->setAgeGroup2M(1);
        $outbreak->setAgeGroup3F(1);
        $outbreak->setAgeGroup3M(1);
        $outbreak->setAgeGroup4F(1);
        $outbreak->setAgeGroup4M(1);
        $outbreak->setAgeGroup5F(1);
        $outbreak->setAgeGroup5M(1);
        $outbreak->setAgeGroup6F(1);
        $outbreak->setAgeGroup6M(1);
        $outbreak->setAgeGroup7F(1);
        $outbreak->setAgeGroup7M(1);
        $this->manager->persist($outbreak);
        */
        
        $this->createOutbreakItems($this->getReference('OUTBREAK1'), 0, 10, 11, 20, 21, 30, 31, 40, 41, 50, 51, 60, 61, 70, 71);
        $this->createOutbreakItems($this->getReference('OUTBREAK1'), 1, 10, 11, 20, 21, 30, 31, 40, 41, 50, 51, 60, 61, 70, 71);
        $this->createOutbreakItems($this->getReference('OUTBREAK1'), 2, 10, 11, 20, 21, 30, 31, 40, 41, 50, 51, 60, 61, 70, 71);
        $this->createOutbreakItems($this->getReference('OUTBREAK1'), 3, 10, 11, 20, 21, 30, 31, 40, 41, 50, 51, 60, 61, 70, 71);
        $this->createOutbreakItems($this->getReference('OUTBREAK1'), 4, 10, 11, 20, 21, 30, 31, 40, 41, 50, 51, 60, 61, 70, 71);
        $this->createOutbreakItems($this->getReference('OUTBREAK1'), 5, 10, 11, 20, 21, 30, 31, 40, 41, 50, 51, 60, 61, 70, 71);
        $this->createOutbreakItems($this->getReference('OUTBREAK1'), 6, 10, 11, 20, 21, 30, 31, 40, 41, 50, 51, 60, 61, 70, 71);
        
        $this->createOutbreakItems($this->getReference('OUTBREAK2'), 0, 10, 11, 20, 21, 30, 31, 40, 41, 50, 51, 60, 61, 70, 71);
        $this->createOutbreakItems($this->getReference('OUTBREAK2'), 1, 10, 11, 20, 21, 30, 31, 40, 41, 50, 51, 60, 61, 70, 71);
        $this->createOutbreakItems($this->getReference('OUTBREAK2'), 2, 10, 11, 20, 21, 30, 31, 40, 41, 50, 51, 60, 61, 70, 71);
        $this->createOutbreakItems($this->getReference('OUTBREAK2'), 3, 10, 11, 20, 21, 30, 31, 40, 41, 50, 51, 60, 61, 70, 71);
        $this->createOutbreakItems($this->getReference('OUTBREAK2'), 4, 10, 11, 20, 21, 30, 31, 40, 41, 50, 51, 60, 61, 70, 71);
        $this->createOutbreakItems($this->getReference('OUTBREAK2'), 5, 10, 11, 20, 21, 30, 31, 40, 41, 50, 51, 60, 61, 70, 71);
        $this->createOutbreakItems($this->getReference('OUTBREAK2'), 6, 10, 11, 20, 21, 30, 31, 40, 41, 50, 51, 60, 61, 70, 71);
        
        $this->manager->flush();
        
    }
    
    protected function createOutbreakItems(
            $outbreak, $dayOfTheWeek, 
            $ageGroup1F, $ageGroup1M,
            $ageGroup2F, $ageGroup2M,
            $ageGroup3F, $ageGroup3M,
            $ageGroup4F, $ageGroup4M,
            $ageGroup5F, $ageGroup5M,
            $ageGroup6F, $ageGroup6M,
            $ageGroup7F, $ageGroup7M)
    {
        $item = new OutbreakItems();
        $item->setOutbreak($outbreak);
        $item->setDayOfTheWeek($dayOfTheWeek);
        $item->setAgeGroup1F($ageGroup1F);
        $item->setAgeGroup1M($ageGroup1M);
        $item->setAgeGroup2F($ageGroup2F);
        $item->setAgeGroup2M($ageGroup2M);
        $item->setAgeGroup3F($ageGroup3F);
        $item->setAgeGroup3M($ageGroup3M);
        $item->setAgeGroup4F($ageGroup4F);
        $item->setAgeGroup4M($ageGroup4M);
        $item->setAgeGroup5F($ageGroup5F);
        $item->setAgeGroup5M($ageGroup5M);
        $item->setAgeGroup6F($ageGroup6F);
        $item->setAgeGroup6M($ageGroup6M);
        $item->setAgeGroup7F($ageGroup7F);
        $item->setAgeGroup7M($ageGroup7M);
        
        $this->manager->persist($item);
        return $item;
    }
    
    /**
     * @InheritDoc
     */
    public function getOrder()
    {
        return 8;
    }
}
