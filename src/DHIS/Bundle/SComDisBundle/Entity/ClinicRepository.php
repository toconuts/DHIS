<?php

namespace DHIS\Bundle\SComDisBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ClinicRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClinicRepository extends EntityRepository
{
    /**
     * Save.
     * 
     * @param Clinic $clinic
     * @throws \InvalidArgumentException 
     */
    public function saveClinic(Clinic $clinic, $update = false)
    {           
        if ($this->isExist($clinic, $update)) {
            throw new \InvalidArgumentException('Error: Duplicated Clinic ID.');
        }
        
        $manager = $this->getEntityManager();
        $manager->persist($clinic);        
        $manager->flush();
    }
    
    public function updateClinic(Clinic $clinic, $update = true)
    {
        $this->saveClinic($clinic, $update);
    }
    
    /**
     * Check whether clinic already exist or not.
     * 
     * @param Clinic $clinic
     * @return boolean 
     */
    public function isExist(Clinic $clinic, $update = false)
    {
        $other = $this->findOneBy(array(
            'id'    => $clinic->getId(),
        ));
        
        if ($other) {
            if ($other->getId() === $clinic->getId()) {
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
     * Delete clinic.
     * 
     * @param int $id
     * @throws \InvalidArgumentException 
     */
    public function deleteClinic($id)
    {
        $clinic = $this->find($id);
        if (!$clinic) {
            throw new \InvalidArgumentException('Error: Clinic is not found.');
        }
        
        $manager = $this->getEntityManager();        
        $manager->remove($clinic);
        $manager->flush();
    }
}