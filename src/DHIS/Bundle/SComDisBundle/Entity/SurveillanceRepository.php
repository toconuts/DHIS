<?php

namespace DHIS\Bundle\SComDisBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * SurveillanceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SurveillanceRepository extends EntityRepository
{
    /**
     * Save.
     * 
     * @param Surveillance $surveillance
     * @throws \InvalidArgumentException 
     */
    public function saveSurveillance(Surveillance $surveillance)
    {   
        $manager = $this->getEntityManager();
        
        if ($this->isExist($surveillance)) {
            throw new \InvalidArgumentException('Error: Duplicated surveillance.');
        }
        
        if ("6" !== $surveillance->getWeekend()->format('w')) {
            throw new \InvalidArgumentException('Error: Invalid weekend.');
        }
        
        $manager->persist($surveillance);
        
        foreach ($surveillance->surveillanceItems as $item ) {
            $item->setSurveillance($surveillance);
            $manager->persist($item);
        }

        $manager->flush();
    }
    
    /**
     * Check whether surveillance already exist or not.
     * 
     * @param Surveillance $surveillance
     * @return boolean 
     */
    public function isExist(Surveillance $surveillance)
    {
        $other = $this->findOneBy(array(
            'weekOfYear'    => $surveillance->getWeekOfYear(),
            'year'       => $surveillance->getYear(),
            'sentinelSite' => $surveillance->getSentinelSite()->getId(),
            'clinic'        => $surveillance->getClinic()->getId(),
        ));
        
        if ($other) {
            if ($other->getId() === $surveillance->getId())
                return false;
            else
                return true;
        }
        
        return false;
    }
    
    /**
     * Delete surveillance.
     * 
     * @param Surveillance $surveillance
     * @throws \InvalidArgumentException 
     */
    public function deleteSurveillance($id)
    {
        $surveillance = $this->find($id);
        if (!$surveillance) {
            throw new \InvalidArgumentException('Error: The surveillance is not found.');
        }
        
        $manager = $this->getEntityManager();
        
        foreach ($surveillance->surveillanceItems as $item ) {
            $manager->remove($item);
        }
        
        $manager->remove($surveillance);
        $manager->flush();
    }
    
    /**
     * Receive surveillance.
     * 
     * @param type $id
     * @param type $user
     * @throws \InvalidArgumentException 
     */
    public function receiveSurveillance($id, $user) {
        $surveillance = $this->find($id);
        if (!$surveillance) {
            throw new \InvalidArgumentException('Error: The surveillance is not found.');
        }
        
        $surveillance->setReceivedBy($user->getDisplayname());
        $surveillance->setReceivedAt(new \DateTime());
        
        $manager = $this->getEntityManager();
        $manager->persist($surveillance);
        $manager->flush();
    }
    
    public function findAllByYearAndSentinelSite(array $years, array $sentinelSites) {
        
        $paramYears = '( ';
        for ($i = 0; $i < count($years); $i++) {
            $paramYears = $paramYears . 's.year = ' . $years[$i];
            if ($i === count($years) - 1) {
                $paramYears = $paramYears . ' )';
            } else {
                $paramYears = $paramYears . ' OR ';
            }
        };
        
        $paramSentinelSites = '( ';
        for ($i = 0; $i < count($sentinelSites); $i++) {
            $paramSentinelSites = $paramSentinelSites . 's.sentinelSite = ' . $sentinelSites[$i];
            if ($i === count($sentinelSites) - 1) {
                $paramSentinelSites = $paramSentinelSites . ' )';
            } else {
                $paramSentinelSites = $paramSentinelSites . ' OR ';
            }
        };
        
        $manager = $this->getEntityManager();
        $query = $manager->createQuery('SELECT s FROM DHISSComDisBundle:Surveillance s WHERE ' . 
                $paramYears . ' AND ' . $paramSentinelSites . ' ORDER BY s.year, s.weekOfYear');
        $surveillances = $query->getResult();
        
        return $surveillances;
    }
}