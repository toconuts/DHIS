<?php

namespace DHIS\Bundle\SComDisBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * SurveillanceGISCriteria.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 */
class SurveillanceGISCriteria extends SurveillancePredictionCriteria
{
    /**
     * @var bool $useNoRecords 
     */
    private $useThresholdInEach;

    public function __construct(array $syndromes)
    {
        parent::__construct($syndromes, array());
        $this->useThresholdInEach = false;
    }
    
    public function setUseThresholdInEach($value)
    {
        $this->useThresholdInEach = $value;
    }
    
    public function isUseThresholdInEach()
    {
        return $this->useThresholdInEach;
    }
}