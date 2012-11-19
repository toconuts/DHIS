<?php

namespace DHIS\Bundle\SComDisBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Outbreak.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @ORM\Table(name="outbreak")
 * @ORM\Entity(repositoryClass="DHIS\Bundle\SComDisBundle\Entity\OutbreakRepository")
 */
class Outbreak
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
     * @var integer $weekOfYear
     * 
     * @ORM\Column(name="week_of_year", type="integer")
     */
    private $weekOfYear;
    
    /**
     * @var integer $year
     * 
     * @ORM\Column(name="year", type="integer")
     */
    private $year;
    
    /**
     * @var datetime $weekEnd
     *
     * @ORM\Column(name="week_end", type="datetime", nullable=false)
     * @Assert\NotBlank
     * @Assert\Date
     */
    private $weekEnd;
 
    /**
     * @var SentinelSite $sentinelSite
     * 
     * @ORM\ManyToOne(targetEntity="SentinelSite")
     * @ORM\JoinColumn(name="sentinel_site_id", referencedColumnName="id", nullable=false)
     * @Assert\NotBlank
     */
    private $sentinelSite;
    
    /**
     * @var Clinic $clinic
     * 
     * @ORM\ManyToOne(targetEntity="Clinic")
     * @ORM\JoinColumn(name="clinic_id", referencedColumnName="id", nullable=false)
     * @Assert\NotBlank
     */
    private $clinic;
    
    /**
     * @var Syndrome $syndrome
     * 
     * @ORM\ManyToOne(targetEntity="Syndrome4Outbreak")
     * @ORM\JoinColumn(name="syndrome_id", referencedColumnName="id", nullable=false)
     * @Assert\NotBlank 
     */
    private $syndrome;
    
    /*
     * @var OutbreakItems $outbreakItems
     * 
     * @ORM\OneToMany(targetEntity="OutbreakItems", mappedBy="outbreak")
     */
    public $outbreakItems;


    /**
     * @var string $reportedBy
     * 
     * @ORM\Column(name="reported_by", type="string", length=100, nullable=false)
     * @Assert\MaxLength(limit=100)
     */
    private $reportedBy;
    
    /**
     * @var datetime $reportedAt
     *
     * @ORM\Column(name="reported_at", type="datetime", nullable=false)
     * @Assert\NotBlank
     * @Assert\Date
     */
    private $reportedAt;
    
    /**
     * @var string $receivedBy
     * 
     * @ORM\Column(name="received_by", type="string", length=100, nullable=true)
     * @Assert\MaxLength(limit=100)
     */
    private $receivedBy;
    
    /**
     * @var datetime $receivedAt
     *
     * @ORM\Column(name="received_at", type="datetime", nullable=true)
     * @Assert\Date
     */
    private $receivedAt;
    
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
        $this->outbreakItems = new ArrayCollection();
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
     * Set weekEnd
     *
     * @param datetime $weekEnd
     */
    public function setWeekEnd($weekEnd)
    {
        $this->weekEnd = $weekEnd;
    }

    /**
     * Get weekEnd
     *
     * @return datetime 
     */
    public function getWeekEnd()
    {
        return $this->weekEnd;
    }

    /**
     * Set reportedBy
     *
     * @param string $reportedBy
     */
    public function setReportedBy($reportedBy)
    {
        $this->reportedBy = $reportedBy;
    }

    /**
     * Get reportedBy
     *
     * @return string 
     */
    public function getReportedBy()
    {
        return $this->reportedBy;
    }

    /**
     * Set reportedAt
     *
     * @param datetime $reportedAt
     */
    public function setReportedAt($reportedAt)
    {
        $this->reportedAt = $reportedAt;
    }

    /**
     * Get reportedAt
     *
     * @return datetime 
     */
    public function getReportedAt()
    {
        return $this->reportedAt;
    }

    /**
     * Set receivedBy
     *
     * @param string $receivedBy
     */
    public function setReceivedBy($receivedBy)
    {
        $this->receivedBy = $receivedBy;
    }

    /**
     * Get receivedBy
     *
     * @return string 
     */
    public function getReceivedBy()
    {
        return $this->receivedBy;
    }

    /**
     * Set receivedAt
     *
     * @param datetime $receivedAt
     */
    public function setReceivedAt($receivedAt)
    {
        $this->receivedAt = $receivedAt;
    }

    /**
     * Get receivedAt
     *
     * @return datetime 
     */
    public function getReceivedAt()
    {
        return $this->receivedAt;
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
     * Set sentinelSite
     *
     * @param DHIS\Bundle\SComDisBundle\Entity\SentinelSite $sentinelSite
     */
    public function setSentinelSite(\DHIS\Bundle\SComDisBundle\Entity\SentinelSite $sentinelSite)
    {
        $this->sentinelSite = $sentinelSite;
    }

    /**
     * Get sentinelSite
     *
     * @return DHIS\Bundle\SComDisBundle\Entity\SentinelSite 
     */
    public function getSentinelSite()
    {
        return $this->sentinelSite;
    }

    /**
     * Set clinic
     *
     * @param DHIS\Bundle\SComDisBundle\Entity\Clinic $clinic
     */
    public function setClinic(\DHIS\Bundle\SComDisBundle\Entity\Clinic $clinic)
    {
        $this->clinic = $clinic;
    }

    /**
     * Get clinic
     *
     * @return DHIS\Bundle\SComDisBundle\Entity\Clinic 
     */
    public function getClinic()
    {
        return $this->clinic;
    }

    /**
     * Set syndrome
     *
     * @param DHIS\Bundle\SComDisBundle\Entity\Syndrome4Outbreak $syndrome
     */
    public function setSyndrome(\DHIS\Bundle\SComDisBundle\Entity\Syndrome4Outbreak $syndrome)
    {
        $this->syndrome = $syndrome;
    }

    /**
     * Get syndrome
     *
     * @return DHIS\Bundle\SComDisBundle\Entity\Syndrome4Outbreak 
     */
    public function getSyndrome()
    {
        return $this->syndrome;
    }

    /**
     * Set weekOfYear
     *
     * @param integer $weekOfYear
     */
    public function setWeekOfYear($weekOfYear)
    {
        $this->weekOfYear = $weekOfYear;
    }

    /**
     * Get weekOfYear
     *
     * @return integer 
     */
    public function getWeekOfYear()
    {
        return $this->weekOfYear;
    }

    /**
     * Set year
     *
     * @param integer $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        return $this->year;
    }
    
    /**
     * Get outbreakItems
     * 
     * @return Doctrine\Common\Collections\Collection
     */
    public function getOutbreakItems()
    {
        return $this->outbreakItems;
    }
}