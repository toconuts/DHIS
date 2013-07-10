<?php

namespace DHIS\Bundle\SComDisBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * District.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @ORM\Table(name="sentinel_site")
 * @ORM\Entity(repositoryClass="DHIS\Bundle\SComDisBundle\Entity\SentinelSiteRepository")
 */
class SentinelSite
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
     * @var Clinic $clinics
     * 
     * @ORM\OneToMany(targetEntity="Clinic", mappedBy="sentinelSite")
     */
    private $clinics;
    
    public function __construct()
    {
        $this->clinics = new ArrayCollection();
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
}