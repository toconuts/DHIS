<?php

namespace DHIS\Bundle\SComDisBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PhaseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PhaseRepository extends EntityRepository
{
    /**
     * Save.
     * 
     * @param Phase $phase
     * @throws \InvalidArgumentException 
     */
    public function savePhase(Phase $phase, $update = false)
    {           
        if ($this->isExist($phase, $update)) {
            throw new \InvalidArgumentException('Error: Duplicated Phase ID.');
        }
        
        
        
        $manager = $this->getEntityManager();
        $manager->persist($phase);
        $manager->flush();
    }
    
    public function updatePhase(Phase $phase, $update = true)
    {
        $this->savePhase($phase, $update);
    }
    
    /**
     * Check whether phase already exist or not.
     * 
     * @param Phase $phase
     * @return boolean 
     */
    public function isExist(Phase $phase, $update = false)
    {
        $other = $this->findOneBy(array(
            'id'    => $phase->getId(),
        ));
        
        if ($other) {
            if ($other->getId() === $phase->getId()) {
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
     * Delete phase.
     * 
     * @param int $id
     * @throws \InvalidArgumentException 
     */
    public function deletePhase($id)
    {
        $phase = $this->find($id);
        if (!$phase) {
            throw new \InvalidArgumentException('Error: Phase is not found.');
        }
        
        $manager = $this->getEntityManager();
        $manager->remove($phase);
        $manager->flush();
    }
}