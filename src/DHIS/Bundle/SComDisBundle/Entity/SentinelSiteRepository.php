<?php

namespace DHIS\Bundle\SComDisBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * SentinelSiteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SentinelSiteRepository extends EntityRepository
{
    /**
     * Save.
     * 
     * @param SentinelSite $sentinelSite
     * @throws \InvalidArgumentException 
     */
    public function saveSentinelSite(SentinelSite $sentinelSite, $update = false)
    {           
        if ($this->isExist($sentinelSite, $update)) {
            throw new \InvalidArgumentException('Error: Duplicated Sentinel Site ID.');
        }
        
        $manager = $this->getEntityManager();
        $manager->persist($sentinelSite);
        $manager->flush();
    }
    
    public function updateSentinelSite(SentinelSite $sentinelSite, $update = true)
    {
        $this->saveSentinelSite($sentinelSite, $update);
    }
    
    /**
     * Check whether sentinel site already exist or not.
     * 
     * @param SentinelSite $sentinelSite
     * @return boolean 
     */
    public function isExist(SentinelSite $sentinelSite, $update = false)
    {
        $other = $this->findOneBy(array(
            'id'    => $sentinelSite->getId(),
        ));
        
        if ($other) {
            if ($other->getId() === $sentinelSite->getId()) {
                if ($update)
                    return false;
                else
                    return true;
            } else {
                return true;
            }
        }
        
        return false;
    }
    
    /**
     * Delete SentinelSite.
     * 
     * @param int $id
     * @throws \InvalidArgumentException 
     */
    public function deleteSentinelSite($id)
    {
        $sentinelSite = $this->find($id);
        if (!$sentinelSite) {
            throw new \InvalidArgumentException('Error: Sentinel Site is not found.');
        }
        
        $manager = $this->getEntityManager();        
        $manager->remove($sentinelSite);
        $manager->flush();
    }
}