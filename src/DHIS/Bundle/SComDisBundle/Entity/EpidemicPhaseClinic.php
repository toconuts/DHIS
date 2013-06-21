<?php

namespace DHIS\Bundle\SComDisBundle\Entity;

/**
 * EpidemicPhaseClinic.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 */
class EpidemicPhaseClinic
{
    /**
     * @var EpidemicPhase $epidemicPhase
     */
    private $epidemicPhase;
    
    /**
     * @var Clinic $clinic
     */
    private $clinic;
    
    /**
     * @var integer $casesOfTarget
     */
    private $casesOfTarget;
    
    /**
     * @var array $casesOfCalc
     */
    private $casesOfCalc;
    
    /**
     * @var integer $totalOfCalcCases
     */
    private $totalOfCalcCases;

    /**
     * @var integer $numberOfCases
     */
    private $numberOfCalcCases;

    /**
     * @var float $average
     */
    private $average;
    
    /**
     * @var integer $sd
     */
    private $sd;
    
    /**
     * @var float $coefficient
     */
    private $coefficient;
    
    /**
     * @var integer $phase
     */
    private $phase;

    public function __construct(EpidemicPhase $epidemicPhase, Clinic $clinic, $calcYears)
    {
        if ($epidemicPhase === null || $clinic === NULL)
            throw new \InvalidArgumentException();
        
        $this->epidemicPhase = $epidemicPhase;
        $this->clinic = $clinic;
        
        $this->casesOfTarget = $this->epidemicPhase->isUseNoRecord() ? 0 : NULL;
        
        foreach ($calcYears as $calcYear) {
            $this->casesOfCalc[$calcYear] = $this->epidemicPhase->isUseNoRecord() ? 0 : NULL;
        }

        $this->totalOfCalcCases = 0;
        $this->numberOfCalcCases = 0;
        $this->average = NULL;
        $this->sd = NULL;
        $this->coefficient = NULL;
        $this->phase = NULL;
    }

    public function getId()
    {
        return $this->clinic->getId();
    }
    
    public function getName()
    {
        return $this->clinic->getName();
    }
    
    public function setCasesOfTarget($value)
    {
        $this->casesOfTarget = $value;
    }
    
    public function getCasesOfTarget()
    {
        return $this->casesOfTarget;
    }
    
    public function addCasesOfCalc($value)
    {
        $this->casesOfCalc[] = $value;
    }
    
    public function setCaseOfCalc($year, $value)
    {
        $this->casesOfCalc[$year] = $value;
    }
    
    public function getCasesOfCalc()
    {
        return $this->casesOfCalc;
    }
    
    public function getTotalOfCalcCases()
    {
        return $this->totalOfCalcCases;
    }
    
    public function getNumberOfCalcCases()
    {
        return $this->numberOfCalcCases;
    }
    
    public function getAverage()
    {
        return $this->average;
    }
    
    public function getSD()
    {
        return $this->sd;
    }
    
    public function getCoefficient()
    {
        return $this->coefficient;
    }
    
    public function getPhase()
    {
        return $this->phase;
    }
    
    public function update()
    {
        // Sum Calc Cases and count number of calc
        $casesOfCalc = array();
        foreach ($this->casesOfCalc as $caseOfCalc) {
            if ($caseOfCalc === NULL) {
                if ($this->epidemicPhase->isUseNoRecord() == true) {
                    $casesOfCalc[] = 0;
                }
            } else {
                $casesOfCalc[] = $caseOfCalc;
            }
        }
        
        if ($this->casesOfTarget === NULL && $this->epidemicPhase->isUseNoRecord() == true)
            $this->casesOfTarget = 0;
        
        $this->totalOfCalcCases = array_sum($casesOfCalc);
        $this->numberOfCalcCases = count($casesOfCalc);
        
        // Calc average
        if ($this->numberOfCalcCases > 0) {
            $this->average = round((float)$this->totalOfCalcCases / 
                (float)$this->numberOfCalcCases, 3);
        } else {
            $this->average = NULL;
        }
        
        // Calc Standard Deviation
        if ($this->numberOfCalcCases > 1) { // Because sample true is (n - 1). Protect dividing with zero.
            $this->sd = round(CommonUtils::staticsStandardDeviation($casesOfCalc, true), 3);
        } else if ($this->epidemicPhase->isToGenerateErrorException()) {
            $this->sd = NULL;
            $this->coefficient = NULL;
            $this->phase = NULL;
            $message = "Can not calculate standard daviation because there are not enough records. Please try to check \"no records as 0 case\" option.";
            throw new \InvalidArgumentException($message);
        } else {
            $this->sd = 0;
        }
        
        // Calc coefficient
        if ($this->casesOfTarget === NULL) {
            
        } elseif ($this->sd == 0) {
            $this->coefficient = 0;
        } else {
            $this->coefficient = round(($this->casesOfTarget - $this->average) / $this->sd, 3);
        }
        
        // Judge the phase
        $this->phase = $this->epidemicPhase->judgePhase($this->coefficient);
    }
}
