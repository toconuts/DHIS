<?php

namespace DHIS\Bundle\SComDisBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * District
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @ORM\Table(name="district")
 * @ORM\Entity(repositoryClass="DHIS\Bundle\SComDisBundle\Entity\DistrictRepository")
 */
class District
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;
    
    /**
     * @var string $name
     * 
     * @ORM\Column(name="name", type="string", length=100, unique=true)
     * @Assert\MaxLength(limit=100)
     */
    private $name;
    
    /**
     * @var integer $population
     *
     * @ORM\Column(name="population", type="integer")
     */
    private $population;

    /**
     * @var Clinic $clinics
     * 
     * @ORM\OneToMany(targetEntity="Clinic", mappedBy="district")
     */
    private $clinics;
    
    private $ratio;
    
    public function __construct()
    {
        $this->clinics = new ArrayCollection();
        $ratio = 0.0;
    }
    
    /**
     * __toString()
     * 
     * @return string 
     */
    public function __toString()
    {
        return (string)$this->name;
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set population
     *
     * @param integer $population
     */
    public function setPopulation($population)
    {
        $this->population = $population;
    }
    
    /**
     * Get population
     *
     * @return integer 
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * Add clinics
     *
     * @param DHIS\Bundle\SComDisBundle\Entity\Clinic $clinics
     */
    public function addClinic(\DHIS\Bundle\SComDisBundle\Entity\Clinic $clinics)
    {
        $this->clinics[] = $clinics;
    }

    /**
     * Get clinics
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getClinics()
    {
        return $this->clinics;
    }
    
    /**
     * Update Ratio
     *
     * @param float $total
     */
    public function updateRatio($total) 
    {
        $this->ratio = round((float)$this->population / (float)$total, 3);
    }
    
    /**
     * Get ratio
     *
     * @return float
     */
    public function getRatio() 
    {
        return $this->ratio;
    }
}