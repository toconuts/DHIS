<?php

namespace DHIS\Bundle\SComDisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Syndrome.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @ORM\Table(name="surveillance_items")
 * @ORM\Entity()
 */
class SurveillanceItems
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Surveilance $syndrome
     * 
     * @ORM\ManyToOne(targetEntity="Surveillance")
     * @ORM\JoinColumn(name="surveillance_id", referencedColumnName="id", nullable=false)
     * @Assert\NotBlank 
     */
    private $surveillance;
    
    /**
     * @var Syndrome $syndrome
     * 
     * @ORM\ManyToOne(targetEntity="Syndrome4Surveillance")
     * @ORM\JoinColumn(name="syndrom_id", referencedColumnName="id", nullable=false)
     * @Assert\NotBlank 
     */
    private $syndrome;

    /**
     * @var integer $sunday
     * 
     * @ORM\Column(name="sunday", type="integer") 
     */
    private $sunday;
    
    /**
     * @var integer $monday
     * 
     * @ORM\Column(name="monday", type="integer") 
     */
    private $monday;
    
    /**
     * @var integer $tuesday
     * 
     * @ORM\Column(name="tuesday", type="integer") 
     */
    private $tuesday;
    
    /**
     * @var integer $wednesday
     * 
     * @ORM\Column(name="wednesday", type="integer") 
     */
    private $wednesday;
    
    /**
     * @var integer $thursday
     * 
     * @ORM\Column(name="thursday", type="integer") 
     */
    private $thursday;
    
    /**
     * @var integer $friday
     * 
     * @ORM\Column(name="friday", type="integer") 
     */
    private $friday;
    
    /**
     * @var integer $saturday
     * 
     * @ORM\Column(name="saturday", type="integer") 
     */
    private $saturday;
    
    /**
     * @var string $referrals
     * 
     * @ORM\Column(name="referrals", type="string", length=50, nullable=true)
     * @Assert\MaxLength(limit=50)
     */
    private $referrals;
    
    /**
     * @var datetime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var datetime $updatedAt
     *
     * @ORM\Column(name="updated_at", type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;
    
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
     * Set sunday
     *
     * @param integer $sunday
     */
    public function setSunday($sunday)
    {
        $this->sunday = $sunday;
    }

    /**
     * Get sunday
     *
     * @return integer 
     */
    public function getSunday()
    {
        return $this->sunday;
    }

    /**
     * Set monday
     *
     * @param integer $monday
     */
    public function setMonday($monday)
    {
        $this->monday = $monday;
    }

    /**
     * Get monday
     *
     * @return integer 
     */
    public function getMonday()
    {
        return $this->monday;
    }

    /**
     * Set tuesday
     *
     * @param integer $tuesday
     */
    public function setTuesday($tuesday)
    {
        $this->tuesday = $tuesday;
    }

    /**
     * Get tuesday
     *
     * @return integer 
     */
    public function getTuesday()
    {
        return $this->tuesday;
    }

    /**
     * Set wednesday
     *
     * @param integer $wednesday
     */
    public function setWednesday($wednesday)
    {
        $this->wednesday = $wednesday;
    }

    /**
     * Get wednesday
     *
     * @return integer 
     */
    public function getWednesday()
    {
        return $this->wednesday;
    }

    /**
     * Set thursday
     *
     * @param integer $thursday
     */
    public function setThursday($thursday)
    {
        $this->thursday = $thursday;
    }

    /**
     * Get thursday
     *
     * @return integer 
     */
    public function getThursday()
    {
        return $this->thursday;
    }

    /**
     * Set friday
     *
     * @param integer $friday
     */
    public function setFriday($friday)
    {
        $this->friday = $friday;
    }

    /**
     * Get friday
     *
     * @return integer 
     */
    public function getFriday()
    {
        return $this->friday;
    }

    /**
     * Set saturday
     *
     * @param integer $saturday
     */
    public function setSaturday($saturday)
    {
        $this->saturday = $saturday;
    }

    /**
     * Get saturday
     *
     * @return integer 
     */
    public function getSaturday()
    {
        return $this->saturday;
    }

    /**
     * Set referrals
     *
     * @param string $referrals
     */
    public function setReferrals($referrals)
    {
        $this->referrals = $referrals;
    }

    /**
     * Get referrals
     *
     * @return string 
     */
    public function getReferrals()
    {
        return $this->referrals;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get updatedAt
     *
     * @return datetime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set surveillance
     *
     * @param DHIS\Bundle\SComDisBundle\Entity\Surveillance $surveillance
     */
    public function setSurveillance(\DHIS\Bundle\SComDisBundle\Entity\Surveillance $surveillance)
    {
        $this->surveillance = $surveillance;
    }

    /**
     * Get surveillance
     *
     * @return DHIS\Bundle\SComDisBundle\Entity\Surveillance 
     */
    public function getSurveillance()
    {
        return $this->surveillance;
    }

    /**
     * Set syndrome
     *
     * @param DHIS\Bundle\SComDisBundle\Entity\Syndrome4Surveillance $syndrome
     */
    public function setSyndrome(\DHIS\Bundle\SComDisBundle\Entity\Syndrome4Surveillance $syndrome)
    {
        $this->syndrome = $syndrome;
    }

    /**
     * Get syndrome
     *
     * @return DHIS\Bundle\SComDisBundle\Entity\Syndrome4Surveillance 
     */
    public function getSyndrome()
    {
        return $this->syndrome;
    }
}