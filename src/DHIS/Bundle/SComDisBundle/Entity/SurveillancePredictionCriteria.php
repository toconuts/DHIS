<?php

namespace DHIS\Bundle\SComDisBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * SurveillanceTrendCriteria.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 */
class SurveillancePredictionCriteria extends SurveillanceTrendCriteria
{
    /**
     * @var id $targetYear 
     */
    private $targetYear;


    /**
     * @var bool $useNoRecords 
     */
    private $useNoRecords;

    /**
     * @var int $confidenceCoefficient
     */
    private $confidenceCoefficient;

    public function __construct(array $syndromes, array $sentinelSites)
    {
        parent::__construct($syndromes, $sentinelSites);
        $this->targetYear = 0;
        $this->useNoRecord = false;
        $this->confidenceCoefficient = 1.645;
    }
    
    public function setTargetYear($value)
    {
        $this->targetYear = $value;
    }
    
    public function getTargetYear()
    {
        return $this->targetYear;
    }

    public function setUseNoRecords($value)
    {
        $this->useNoRecords = $value;
    }
    
    public function isUseNoRecords()
    {
        return $this->useNoRecords;
    }
    
    public function setConfidenceCoefficient($value)
    {
        $this->confidenceCoefficient = $value;
    }
    
    public function getConfidenceCoefficient()
    {
        return $this->confidenceCoefficient;
    }
}