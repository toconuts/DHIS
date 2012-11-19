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
     * @var integer $dayOfTheWeek
     * 
     * @ORM\Column(name="day_of_the_week", type="integer", nullable=false)
     * @Assert\NotBlank
     */
    private $dayOfTheWeek;

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
     * @var integer $sex
     * 
     * @ORM\Column(name="sex", type="integer", nullable=false)
     * @Assert\NotBlank
     */
    private $sex;

    /**
     * @var integer $sunday
     * 
     * @ORM\Column(name="age_group1", type="integer", nullable=false)
     */
    private $ageGroup1;
    
    /**
     * @var integer $ageGroup2
     * 
     * @ORM\Column(name="age_group2", type="integer", nullable=false)
     */
    private $ageGroup2;
    
    /**
     * @var integer $ageGroup3
     * 
     * @ORM\Column(name="age_group3", type="integer", nullable=false)
     */
    private $ageGroup3;
    
    /**
     * @var integer $age_group4
     * 
     * @ORM\Column(name="age_group4", type="integer", nullable=false)
     */
    private $ageGroup4;
    
    /**
     * @var integer $thursday
     * 
     * @ORM\Column(name="age_group5", type="integer", nullable=false)
     */
    private $ageGroup5;
    
    /**
     * @var integer $ageGroup6
     * 
     * @ORM\Column(name="age_group6", type="integer", nullable=false)
     */
    private $ageGroup6;
    
    /**
     * @var integer $ageGroup7
     * 
     * @ORM\Column(name="age_group7", type="integer", nullable=false)
     */
    private $ageGroup7;

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
        $this->ageGroup1 = 0;
        $this->ageGroup2 = 0;
        $this->ageGroup3 = 0;
        $this->ageGroup4 = 0;
        $this->ageGroup5 = 0;
        $this->ageGroup6 = 0;
        $this->ageGroup7 = 0;
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

    /**
     * Set dayOfTheWeek
     *
     * @param integer $dayOfTheWeek
     */
    public function setDayOfTheWeek($dayOfTheWeek)
    {
        $this->dayOfTheWeek = $dayOfTheWeek;
    }

    /**
     * Get dayOfTheWeek
     *
     * @return integer 
     */
    public function getDayOfTheWeek()
    {
        return $this->dayOfTheWeek;
    }

    /**
     * Set ageGroup1
     *
     * @param integer $ageGroup1
     */
    public function setAgeGroup1($ageGroup1)
    {
        $this->ageGroup1 = $ageGroup1;
    }

    /**
     * Get ageGroup1
     *
     * @return integer 
     */
    public function getAgeGroup1()
    {
        return $this->ageGroup1;
    }

    /**
     * Set ageGroup2
     *
     * @param integer $ageGroup2
     */
    public function setAgeGroup2($ageGroup2)
    {
        $this->ageGroup2 = $ageGroup2;
    }

    /**
     * Get ageGroup2
     *
     * @return integer 
     */
    public function getAgeGroup2()
    {
        return $this->ageGroup2;
    }

    /**
     * Set ageGroup3
     *
     * @param integer $ageGroup3
     */
    public function setAgeGroup3($ageGroup3)
    {
        $this->ageGroup3 = $ageGroup3;
    }

    /**
     * Get ageGroup3
     *
     * @return integer 
     */
    public function getAgeGroup3()
    {
        return $this->ageGroup3;
    }

    /**
     * Set ageGroup4
     *
     * @param integer $ageGroup4
     */
    public function setAgeGroup4($ageGroup4)
    {
        $this->ageGroup4 = $ageGroup4;
    }

    /**
     * Get ageGroup4
     *
     * @return integer 
     */
    public function getAgeGroup4()
    {
        return $this->ageGroup4;
    }

    /**
     * Set ageGroup5
     *
     * @param integer $ageGroup5
     */
    public function setAgeGroup5($ageGroup5)
    {
        $this->ageGroup5 = $ageGroup5;
    }

    /**
     * Get ageGroup5
     *
     * @return integer 
     */
    public function getAgeGroup5()
    {
        return $this->ageGroup5;
    }

    /**
     * Set ageGroup6
     *
     * @param integer $ageGroup6
     */
    public function setAgeGroup6($ageGroup6)
    {
        $this->ageGroup6 = $ageGroup6;
    }

    /**
     * Get ageGroup6
     *
     * @return integer 
     */
    public function getAgeGroup6()
    {
        return $this->ageGroup6;
    }

    /**
     * Set ageGroup7
     *
     * @param integer $ageGroup7
     */
    public function setAgeGroup7($ageGroup7)
    {
        $this->ageGroup7 = $ageGroup7;
    }

    /**
     * Get ageGroup7
     *
     * @return integer 
     */
    public function getAgeGroup7()
    {
        return $this->ageGroup7;
    }
}