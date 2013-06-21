<?php

namespace DHIS\Bundle\SComDisBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * SurveillanceCoefficientCriteria.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 */
class SurveillanceCoefficientCriteria
{
    /**
     * @var id $targetYear 
     */
    private $targetYear;
    
    /**
     * @var datetime $weekend
     */
    private $weekend;
    
    /**
     * @var integer $weekOfYear
     */
    private $weekOfYear;
    
    /**
     * @var integer $year
     */
    private $year;
    
    /**
     * @var array $yearChoices 
     */
    private $yearChoices;
    
    /**
     * @var array $syndromes
     */
    private $syndromes;

    /**
     * @var bool $useNoRecords 
     */
    private $useNoRecords;
    
    /**
     * @var bool $useIslandwideSD 
     */
    private $useLandwideSD;
    
    /**
     * @var bool $showIslandwide
     */
    private $showIslandwide;

    public function __construct(array $syndromes)
    {
        $this->setYears();
        $this->targetYear = 0;
        $this->weekend = new \DateTime('last Saturday');
        $this->weekend->setTime(0, 0, 0);
        $this->weekOfYear = strftime('%V', time());
        $this->year = strftime('%G', time());
        $this->syndromes = $syndromes;
        $this->useNoRecords = true;
        $this->useLandwideSD = false;
        $this->showIslandwide = false;
    }
    
    /**
     * Set targetYear
     *
     * @param string $value
     */
    public function setTargetYear($value)
    {
        $this->targetYear = $value;
    }
    
    /**
     * Get targetYear
     *
     * @return string $targetYear
     */
    public function getTargetYear()
    {
        return $this->targetYear;
    }
    
    /**
     * Set weekend
     *
     * @param datetime $weekend
     */
    public function setWeekend($weekend)
    {
        $this->weekend = $weekend;
    }

    /**
     * Get weekend
     *
     * @return datetime 
     */
    public function getWeekend()
    {
        return $this->weekend;
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
    
    public function setUseNoRecords($value)
    {
        $this->useNoRecords = $value;
    }
    
    public function isUseNoRecords()
    {
        return $this->useNoRecords;
    }
    
    public function setUseLandwideSD($value)
    {
        $this->useLandwideSD = $value;
    }
    
    public function isUseLandwideSD()
    {
        return $this->useLandwideSD;
    }
    
    public function setShowIslandwide($value)
    {
        $this->showIslandwide = $value;
    }
    
    public function isShowIslandwide()
    {
        return $this->showIslandwide;
    }
}