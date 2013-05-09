<?php

namespace DHIS\Bundle\SComDisBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * SurveillanceTrendCriteria.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 */
class SurveillanceTrendCriteria
{
    /**
     * @var array $yearChoices 
     */
    private $yearChoices;
    
    /**
     * @var array $syndromes
     */
    private $syndromes;

    /**
     * @var array $sentinelSites
     */
    private $sentinelSites;
    
    /**
     * 
     * @var type 
     */
    private $useSeriesSyndromes;

    public function __construct(array $syndromes, array $sentinelSites)
    {
        $this->syndromes = $syndromes;
        $this->sentinelSites = $sentinelSites;
        $this->setYears();
        $this->useSeriesSyndromes = false;
    }
    
    public function setYears() {
        $year = date('Y');
        for ($i = $year; $year >= CommonUtils::$BEGINING_YEAR; $year--){
            $this->yearChoices[] = $year;
        }
    }

    public function setYearChoices(array $years) {
        $this->yearChoices = $years;
    }
    
    public function getYearChoices() {
        return $this->yearChoices;
    }
    
    public function setSyndromes(array $syndromes) {
        $this->syndromes = $syndromes;
    }
    
    public function getSyndromes() {
        return $this->syndromes;
    }
    
    public function setSentinelSites(array $sentinelSites) {
        $this->sentinelSites = $sentinelSites;
    }
    
    public function getSentinelSites() {
        return $this->sentinelSites;
    }
    
    public function setUseSeriesSyndromes($value)
    {
        $this->useSeriesSyndromes = $value;
    }
    
    public function isUseSeriesSyndromes() {
        return $this->useSeriesSyndromes;
    }
}