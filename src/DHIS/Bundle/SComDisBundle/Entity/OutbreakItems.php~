<?php

namespace DHIS\Bundle\SComDisBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * OutbreakItems.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @ORM\Table(name="outbreak_items")
 * @ORM\Entity()
 */
class OutbreakItems
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
     * @var Outbreak $outbreak
     * 
     * @ORM\ManyToOne(targetEntity="Outbreak")
     * @ORM\JoinColumn(name="outbreak_id", referencedColumnName="id", nullable=false)
     * @Assert\NotBlank 
     */
    private $outbreak;
    
    /**
     * AgeGroup.
     * Should be stored following values;
     * 
     * 1 = < 1
     * 2 = 1 < 4
     * 3 = 5 < 14
     * 4 = 15 < 24
     * 5 = 25 < 44
     * 6 = 45 < 64
     * 7 = 65+
     * 
     * @var AgeGroup $ageGroup
     * 
     * @ORM\Column(name="age_group", type="integer", nullable=false)
     * @Assert\NotBlank
     */
    private $ageGroup;

    /**
     * Sex.
     * 
     * Should be stored following values;
     * 0 = Not Known
     * 1 = Male
     * 2 = Female
     * 9 = Not applicable (lawful person such as corporation, organization etc.)
     * 
     * note: ISO/IEC 5218
     * 
     * @var Sex $sex
     * 
     * @ORM\Column(name="sex", type="integer", nullable=false)
     * @Assert\NotBlank
     */
    private $sex;

    /**
     * @var integer $sunday
     * 
     * @ORM\Column(name="sunday", type="integer", nullable=false)
     */
    private $sunday;
    
    /**
     * @var integer $monday
     * 
     * @ORM\Column(name="monday", type="integer", nullable=false)
     */
    private $monday;
    
    /**
     * @var integer $tuesday
     * 
     * @ORM\Column(name="tuesday", type="integer", nullable=false)
     */
    private $tuesday;
    
    /**
     * @var integer $wednesday
     * 
     * @ORM\Column(name="wednesday", type="integer", nullable=false)
     */
    private $wednesday;
    
    /**
     * @var integer $thursday
     * 
     * @ORM\Column(name="thursday", type="integer", nullable=false)
     */
    private $thursday;
    
    /**
     * @var integer $friday
     * 
     * @ORM\Column(name="friday", type="integer", nullable=false)
     */
    private $friday;
    
    /**
     * @var integer $saturday
     * 
     * @ORM\Column(name="saturday", type="integer", nullable=false)
     */
    private $saturday;

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
    
    public function __construct()
    {
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
     * Set ageGroup
     *
     * @param integer $ageGroup
     */
    public function setAgeGroup($ageGroup)
    {
        $this->ageGroup = $ageGroup;
    }

    /**
     * Get ageGroup
     *
     * @return integer 
     */
    public function getAgeGroup()
    {
        return $this->ageGroup;
    }

    /**
     * Set sex
     *
     * @param integer $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * Get sex
     *
     * @return integer 
     */
    public function getSex()
    {
        return $this->sex;
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
     * Set outbreak
     *
     * @param DHIS\Bundle\SComDisBundle\Entity\Outbreak $outbreak
     */
    public function setOutbreak(\DHIS\Bundle\SComDisBundle\Entity\Outbreak $outbreak)
    {
        $this->outbreak = $outbreak;
    }

    /**
     * Get outbreak
     *
     * @return DHIS\Bundle\SComDisBundle\Entity\Outbreak 
     */
    public function getOutbreak()
    {
        return $this->outbreak;
    }
}