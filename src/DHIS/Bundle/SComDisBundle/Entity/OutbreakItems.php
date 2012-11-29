<?php

namespace DHIS\Bundle\SComDisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Outbreak Items.
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
     */
    private $outbreak;
    
    /**
     * @var integer $dayOfTheWeek;
     * 
     * @ORM\Column(name="day_of_the_week", type="integer")
     */
    private $dayOfTheWeek;

    /**
     * @var integer $ageGroup1F
     * 
     * @ORM\Column(name="age_group_1f", type="integer") 
     */
    private $ageGroup1F;
    
    /**
     * @var integer $ageGroup1M
     * 
     * @ORM\Column(name="age_group_1m", type="integer") 
     */
    private $ageGroup1M;
    
    /**
     * @var integer $ageGroup2F
     * 
     * @ORM\Column(name="age_group_2f", type="integer") 
     */
    private $ageGroup2F;
    
    /**
     * @var integer $ageGroup2M
     * 
     * @ORM\Column(name="age_group_2m", type="integer") 
     */
    private $ageGroup2M;
    
    /**
     * @var integer $ageGroup3F
     * 
     * @ORM\Column(name="age_group_3f", type="integer") 
     */
    private $ageGroup3F;
    
    /**
     * @var integer $ageGroup3M
     * 
     * @ORM\Column(name="age_group_3m", type="integer") 
     */
    private $ageGroup3M;
    
    /**
     * @var integer $ageGroup4F
     * 
     * @ORM\Column(name="age_group_4f", type="integer") 
     */
    private $ageGroup4F;
    
    /**
     * @var integer $ageGroup4M
     * 
     * @ORM\Column(name="age_group_4m", type="integer") 
     */
    private $ageGroup4M;
    
    /**
     * @var integer $ageGroup5F
     * 
     * @ORM\Column(name="age_group_5f", type="integer") 
     */
    private $ageGroup5F;
    
    /**
     * @var integer $ageGroup5M
     * 
     * @ORM\Column(name="age_group_5m", type="integer") 
     */
    private $ageGroup5M;
    
    /**
     * @var integer $ageGroup6F
     * 
     * @ORM\Column(name="age_group_6f", type="integer") 
     */
    private $ageGroup6F;
    
    /**
     * @var integer $ageGroup6M
     * 
     * @ORM\Column(name="age_group_6m", type="integer") 
     */
    private $ageGroup6M;
    
    /**
     * @var integer $ageGroup7F
     * 
     * @ORM\Column(name="age_group_7f", type="integer") 
     */
    private $ageGroup7F;
    
    /**
     * @var integer $ageGroup7M
     * 
     * @ORM\Column(name="age_group_7m", type="integer") 
     */
    private $ageGroup7M;
    
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
    
    public static $textualRepOfDayOfTheWeek = array(
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
    );
    
    public function __construct()
    {
        $this->ageGroup1F = 0;
        $this->ageGroup1M = 0;
        $this->ageGroup2F = 0;
        $this->ageGroup2M = 0;
        $this->ageGroup3F = 0;
        $this->ageGroup3M = 0;
        $this->ageGroup4F = 0;
        $this->ageGroup4M = 0;
        $this->ageGroup5F = 0;
        $this->ageGroup5M = 0;
        $this->ageGroup6F = 0;
        $this->ageGroup6M = 0;
        $this->ageGroup7F = 0;
        $this->ageGroup7M = 0;
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
    
    public function getTotal()
    {
        return $this->ageGroup1F
             + $this->ageGroup1M
             + $this->ageGroup2F
             + $this->ageGroup2M
             + $this->ageGroup3F
             + $this->ageGroup3M
             + $this->ageGroup4F
             + $this->ageGroup4M
             + $this->ageGroup5F
             + $this->ageGroup5M
             + $this->ageGroup6F
             + $this->ageGroup6M
             + $this->ageGroup7F
             + $this->ageGroup7M;
    }
    
    public function getDayOfTheWeekString()
    {
        return self::$textualRepOfDayOfTheWeek[$this->dayOfTheWeek];
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
     * Set ageGroup1F
     *
     * @param integer $ageGroup1F
     */
    public function setAgeGroup1F($ageGroup1F)
    {
        $this->ageGroup1F = $ageGroup1F;
    }

    /**
     * Get ageGroup1F
     *
     * @return integer 
     */
    public function getAgeGroup1F()
    {
        return $this->ageGroup1F;
    }

    /**
     * Set ageGroup1M
     *
     * @param integer $ageGroup1M
     */
    public function setAgeGroup1M($ageGroup1M)
    {
        $this->ageGroup1M = $ageGroup1M;
    }

    /**
     * Get ageGroup1M
     *
     * @return integer 
     */
    public function getAgeGroup1M()
    {
        return $this->ageGroup1M;
    }

    /**
     * Set ageGroup2F
     *
     * @param integer $ageGroup2F
     */
    public function setAgeGroup2F($ageGroup2F)
    {
        $this->ageGroup2F = $ageGroup2F;
    }

    /**
     * Get ageGroup2F
     *
     * @return integer 
     */
    public function getAgeGroup2F()
    {
        return $this->ageGroup2F;
    }

    /**
     * Set ageGroup2M
     *
     * @param integer $ageGroup2M
     */
    public function setAgeGroup2M($ageGroup2M)
    {
        $this->ageGroup2M = $ageGroup2M;
    }

    /**
     * Get ageGroup2M
     *
     * @return integer 
     */
    public function getAgeGroup2M()
    {
        return $this->ageGroup2M;
    }

    /**
     * Set ageGroup3F
     *
     * @param integer $ageGroup3F
     */
    public function setAgeGroup3F($ageGroup3F)
    {
        $this->ageGroup3F = $ageGroup3F;
    }

    /**
     * Get ageGroup3F
     *
     * @return integer 
     */
    public function getAgeGroup3F()
    {
        return $this->ageGroup3F;
    }

    /**
     * Set ageGroup3M
     *
     * @param integer $ageGroup3M
     */
    public function setAgeGroup3M($ageGroup3M)
    {
        $this->ageGroup3M = $ageGroup3M;
    }

    /**
     * Get ageGroup3M
     *
     * @return integer 
     */
    public function getAgeGroup3M()
    {
        return $this->ageGroup3M;
    }

    /**
     * Set ageGroup4F
     *
     * @param integer $ageGroup4F
     */
    public function setAgeGroup4F($ageGroup4F)
    {
        $this->ageGroup4F = $ageGroup4F;
    }

    /**
     * Get ageGroup4F
     *
     * @return integer 
     */
    public function getAgeGroup4F()
    {
        return $this->ageGroup4F;
    }

    /**
     * Set ageGroup4M
     *
     * @param integer $ageGroup4M
     */
    public function setAgeGroup4M($ageGroup4M)
    {
        $this->ageGroup4M = $ageGroup4M;
    }

    /**
     * Get ageGroup4M
     *
     * @return integer 
     */
    public function getAgeGroup4M()
    {
        return $this->ageGroup4M;
    }

    /**
     * Set ageGroup5F
     *
     * @param integer $ageGroup5F
     */
    public function setAgeGroup5F($ageGroup5F)
    {
        $this->ageGroup5F = $ageGroup5F;
    }

    /**
     * Get ageGroup5F
     *
     * @return integer 
     */
    public function getAgeGroup5F()
    {
        return $this->ageGroup5F;
    }

    /**
     * Set ageGroup5M
     *
     * @param integer $ageGroup5M
     */
    public function setAgeGroup5M($ageGroup5M)
    {
        $this->ageGroup5M = $ageGroup5M;
    }

    /**
     * Get ageGroup5M
     *
     * @return integer 
     */
    public function getAgeGroup5M()
    {
        return $this->ageGroup5M;
    }

    /**
     * Set ageGroup6F
     *
     * @param integer $ageGroup6F
     */
    public function setAgeGroup6F($ageGroup6F)
    {
        $this->ageGroup6F = $ageGroup6F;
    }

    /**
     * Get ageGroup6F
     *
     * @return integer 
     */
    public function getAgeGroup6F()
    {
        return $this->ageGroup6F;
    }

    /**
     * Set ageGroup6M
     *
     * @param integer $ageGroup6M
     */
    public function setAgeGroup6M($ageGroup6M)
    {
        $this->ageGroup6M = $ageGroup6M;
    }

    /**
     * Get ageGroup6M
     *
     * @return integer 
     */
    public function getAgeGroup6M()
    {
        return $this->ageGroup6M;
    }

    /**
     * Set ageGroup7F
     *
     * @param integer $ageGroup7F
     */
    public function setAgeGroup7F($ageGroup7F)
    {
        $this->ageGroup7F = $ageGroup7F;
    }

    /**
     * Get ageGroup7F
     *
     * @return integer 
     */
    public function getAgeGroup7F()
    {
        return $this->ageGroup7F;
    }

    /**
     * Set ageGroup7M
     *
     * @param integer $ageGroup7M
     */
    public function setAgeGroup7M($ageGroup7M)
    {
        $this->ageGroup7M = $ageGroup7M;
    }

    /**
     * Get ageGroup7M
     *
     * @return integer 
     */
    public function getAgeGroup7M()
    {
        return $this->ageGroup7M;
    }
}