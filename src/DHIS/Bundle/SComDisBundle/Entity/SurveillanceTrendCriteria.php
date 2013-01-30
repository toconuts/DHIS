<?php

namespace DHIS\Bundle\SComDisBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
//use Doctrine\ORM\Mapping as ORM;
//use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SurveillanceTrendCriteria.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 */
class SurveillanceTrendCriteria
{
    
    private $test;
    
    private $year_choices;
    
    /**
     * @var Syndromes $syndromes
     */
    private $syndromes;

    /**
     * __toString()
     * 
     * @return string 
     */
    //public function __toString()
    //{
    //    return (string)$this->name;
    //}

    public function __construct(array $syndromes, array $districts = null)
    {
        $this->syndromes = $syndromes;
    }
    
    public function setTest($value) {
        $this->test = $value;
    }
    
    public function getTest() {
        return $this->test;
    }
    
    public function setYearChoices(array $years) {
        $this->year_choices = $years;
    }
    
    public function getYearChoices() {
        return $this->year_choices;
    }
    
    public function setSyndromes(array $syndromws) {
        $this->syndromes = $syndromws;
    }
    
    public function getSyndromes() {
        return $this->syndromes;
    }
}