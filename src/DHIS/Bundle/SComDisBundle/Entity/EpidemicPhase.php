<?php

namespace DHIS\Bundle\SComDisBundle\Entity;

/**
 * EpidemicPhase
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 */
class EpidemicPhase
{
    /**
     * @var string $title
     */
    private $title;
    
    /**
     * @var string $targetYear
     */
    private $year;
    
    /**
     * @var string
     * 
     * value 0 means Epidemic Phase class is used in calc seasonal coefficient.
     */
    private $weekOfYear;
    
    /**
     * @var array $calcYears
     */
    private $calcYears;
    
    /**
     * @var boolean $isUseNorecord
     */
    private $useNoRecord;
    
    /**
     * @var boolean $isLandwideSD
     */
    private $useLandwideSD;
    
    /**
     * @var boolean $showIslandwide
     */
    private $showIslandwide;
    
    /**
     * @var array $districts 
     */
    private $districts;
    
    /**
     * @var array $syndromes
     */
    private $syndromes;

    /**
     * @var PMH $pmh 
     */
    private $pmh;
    
    private $maxCoefficientValue;
    
    private $minCoefficientValue;
    
    private $messages;
    
    private $phases;

    public function __construct($year, $weekOfYear, array $calcYears, $useNorecord = true, $useLandwideSD = false, $showIslandwide = false)
    {
        $this->title = "title";
        $this->year = $year;
        $this->weekOfYear = $weekOfYear;
        $this->calcYears = $calcYears;
        $this->useNoRecord = $useNorecord;
        $this->useLandwideSD = $useLandwideSD;
        $this->showIslandwide = $showIslandwide;
        
        $this->districts = array();
        $this->syndromes = array();
        
        $this->maxCoefficientValue = 0.0;
        $this->minCoefficientValue = 0.0;
        
        $this->messages = array();
        $this->phases = array();
    }

    /**
     * Set title
     *
     * @param string $value
     */
    public function setTitle($value)
    {
        $this->title = $value;
    }
    
    /**
     * Get title
     *
     * @return string $title 
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Set year
     *
     * @param string $year
     */
    public function setYear($value)
    {
        $this->year = $value;
    }
    
    /**
     * Get year
     *
     * @return string $year 
     */
    public function getYear()
    {
        return $this->year;
    }
    
    /**
     * Set weekOfYear
     *
     * @param string $weekOfYear
     */
    public function setWeekOfYear($value)
    {
        $this->weekOfYear = $value;
    }
    
    /**
     * Get weekOfYear
     *
     * @return string $weekOfYear
     */
    public function getWeekOfYear()
    {
        return $this->weekOfYear;
    }
    
    /**
     * Set calcYears
     *
     * @param array $calcYears
     */
    public function setCalcYears($value)
    {
        $this->calcYears = $value;
    }
    
    /**
     * Get calcYears
     *
     * @return boolean $calcYears
     */
    public function getCalcYears()
    {
        return $this->calcYears;
    }
    
    /**
     * Set useNoRecord
     *
     * @param boolean $useNoRecord
     */
    public function setUseNoRecord($value)
    {
        $this->useNoRecord = $value;
    }
    
    /**
     * Get useNoRecord
     *
     * @return boolean $useNoRecord
     */
    public function isUseNoRecord()
    {
        return $this->useNoRecord;
    }
    
    /**
     * Set useLandwideSD
     *
     * @param boolean $useLandwideSD
     */
    public function setUseLandwideSD($value)
    {
        $this->useLandwideSD = $value;
    }
    
    /**
     * Get useLandwideSD
     *
     * @return boolean $useLandwideSD
     */
    public function isUseLandwideSD()
    {
        return $this->useLandwideSD;
    }
    
    /**
     * Set showIslandwide
     *
     * @param boolean $showIslandwide
     */
    public function setShowIslandwide($value)
    {
        $this->showIslandwide = $value;
    }
    
    /**
     * Get showIslandwide
     *
     * @return boolean $showIslandwide
     */
    public function isShowIslandwide()
    {
        return $this->showIslandwide;
    }
    
    /**
     * Add district
     *
     * @param EpidemicPhaseDistict $district
     */
    public function addDistrict(EpidemicPhaseDistict $district, $week)
    {
        $this->districts[$week][$district->getId()] = $district;
    }
    
    /**
     * Set districts
     *
     * @param EpidemicPhaseDistict $district
     */
    public function setDistricts($districts)
    {
        $this->districts = $districts;
    }
    
    /**
     * Get districts
     *
     * @return array $districts
     */
    public function getDistricts()
    {
        return $this->districts;
    }
    
    /**
     * Analyze 
     */
    public function analyzeCoefficient()
    {
        $this->maxCoefficientValue = 0;
                
        foreach ($this->districts as $week => $districts) {
            foreach ($districts as $district) {
                try {
                    $district->update();
                } catch (\InvalidArgumentException $e) {
                    if (!$this->useLandwideSD) {
                        $name = $district->getName();
                        $this->addMessage($e->getMessage() . "Week: $week, District: $name");
                    }
                }
                $this->updateMinMaxCoefficientValue($district->getCoefficient());
            }
        }
        
        $this->analyzeCoefficientByLandwideSD();
    }
    
    protected function analyzeCoefficientByLandwideSD()
    {
        $this->maxCoefficientValue = 0;

        $id = 0;
        $name = 'Islandwide';
        $totalPopulation = $this->getTotalPopulation();

        foreach ($this->districts as $week => $districts) {
            $casesOfTarget = array();
            $casesOfCalc = array();
            
            foreach ($districts as $district) {
                
                foreach ($district->getClinics() as $clinic) {
                    $tmpCasesOfTarget = array();
                    $tmpCasesOfCalc = array();
                    $clinic->getCases($tmpCasesOfTarget, $tmpCasesOfCalc);
                    $casesOfTarget = array_merge($casesOfTarget, $tmpCasesOfTarget);
                    $casesOfCalc = array_merge($casesOfCalc, $tmpCasesOfCalc);
                }
            }

            // create islandwide epidemic phase district object
            $islandwide = $this->createEpidemicPhaseDistrictInstance($id, $name, $totalPopulation);
            $islandwide->updateValues($casesOfTarget, $casesOfCalc, true);

            // update sd and av in districts
            if ($this->useLandwideSD) {
                foreach ($districts as $district) {
                    $district->updateCoefficientByIslandwideValue($islandwide->getAverage(), $islandwide->getSD());
                    $this->updateMinMaxCoefficientValue($district->getCoefficient());
                }
            }

            // Add weekly island as Destrict Object(id = 0) for view.
            $this->districts[$week][0] = $islandwide;
            ksort($this->districts[$week]);
        }
    }
    
    protected function getTotalPopulation()
    {
        $total = 0;
        $index = ($this->weekOfYear != 0) ? $this->weekOfYear : 1;
        foreach ($this->districts[$index] as $district) {            
                $total += $district->getPopulation();
        }
        return $total;
    }
    
    public function createEpidemicPhaseDistrictInstance($id, $name, $population)
    {
        $islandwide = new District();
        $islandwide->setId($id);
        $islandwide->setName($name);
        $islandwide->setPopulation($population);
        $islandwide->updateRatio($population);

        return new EpidemicPhaseDistrict($this, $islandwide);
    }
    
    public function addMessage($message)
    {
        $this->messages[] = $message;
    }
    
    public function getMessages()
    {
        return $this->messages;
    }
    
    /**
     * Merge clinics into pmh
     * 
     * @param PMH $pmh
     */
    public function mergePMH(array $pmh)
    {
        $this->pmh = $pmh;
        foreach ($this->districts as $week => $districts) {
            foreach ($districts as $districtId => $district) {
                
                $clinicPMH = NULL;
                $casesOfTarget = 0;
                $casesOfCalc = array();
                
                $clinics = $district->getClinics();
                foreach ($clinics as $clinicId => $clinic) {
                    if ($this->isPMH($clinic->getId())) {
                        if ($clinicPMH === NULL) {
                            $clinicPMH = $this->createPMHInstance($district->getDistrict());
                        }
                        
                        $casesOfTarget += $clinic->getCasesOfTarget();
                        if (count($casesOfCalc) == 0) {
                            $casesOfCalc = $clinic->getCasesOfCalc();
                        } else {
                            foreach ($clinic->getCasesOfCalc() as $year => $cases) {
                                $casesOfCalc[$year] += $cases;
                            }
                        }
                        $this->removeClinic($week, $districtId, $clinicId);
                    }
                }
                if ($clinicPMH != NULL) {
                    $this->addClinic($week, $districtId, $clinicPMH);
                    $this->setCasesOfTarget($week, $districtId, PMH::PMHID, $casesOfTarget);
                    foreach ($casesOfCalc as $year => $total) {
                        $this->setCasesOfCalc($week, $districtId, PMH::PMHID, $year, $total);
                    }
                }
            }
        }
    }
    
    protected function createPMHInstance($district)
    {
        $clinic = new Clinic();
        $clinic->setId(PMH::PMHID);
        $clinic->setName(PMH::NAME);
        $clinic->setCode(PMH::CODE);
        //$clinic->setSentinelSite($sentinel);
        $clinic->setDistrict($district);
        
        return new EpidemicPhaseClinic($this, $clinic, $this->getCalcYears());
    }


    protected function isPMH($id)
    {
        foreach ($this->pmh as $department) {
            if ($id == $department->getClinic()->getId())
                return true;
        }
        return false;
    }

    /**
     * Judge Phase
     * 
     * @param float $coefficient
     * @return Phase
     */
    public function judgePhase($coefficient)
    {
// @todo delete
        /*
        if ($coefficient === NULL) {
            return NULL;
        } else if ($coefficient == 0) {
            return 0;
        }
        
        foreach ($this->phases as $phase) {
            if ($phase->getThreshold() <= $coefficient) {
                return $phase->getId();
            }
        }
        
        return 0;
         */
        
        if ($coefficient !== NULL) {// && $coefficient != 0) {
            foreach ($this->phases as $phase) {
                if ($phase->getThreshold() <= $coefficient) {
                    return $phase;
                }
            }
        }
        return NULL;
    }
    
    /**
     * Add syndrome
     *
     * @param Syndrome4Surveillance $syndrome
     */
    public function addSyndrome(Syndrome4Surveillance $syndrome)
    {
        $this->syndromes[] = $syndrome;
    }
    
    public function isTargetSyndrome($id) {
        foreach ($this->syndromes as $syndrome) {
            if ($syndrome->getId() == $id)
                return true;
        }
        return false;
    }
    
    public function addPhase(Phase $value)
    {
        $this->phases[] = $value;
    }
    
    public function setPhases(array $values)
    {
        $this->phases = $values;
        uasort($this->phases, array($this, 'cmpThreshold'));
    }
    
    function cmpThreshold(Phase $a, Phase $b)
    {
        if ($a->getThreshold() == $b->getThreshold()) {
            return 0;
        }
        
        return ($a->getThreshold() < $b->getThreshold()) ? 1 : -1;
    }
    
    public function getSyndromes()
    {
        return $this->syndromes;
    }
    
    public function setPMH(array $values)
    {
        $this->pmh = $values;
    }
    
    public function getPMH()
    {
        return $this->pmh;
    }
    
    public function getMaxCoefficientValue()
    {
        return $this->maxCoefficientValue;
    }

    public function getMinCoefficientValue()
    {
        return $this->minCoefficientValue;
    }
    
    protected function updateMinMaxCoefficientValue($value)
    {   
        if ($this->minCoefficientValue > $value) {
            $this->minCoefficientValue = $value;
        }
        if ($this->maxCoefficientValue < $value) {
            $this->maxCoefficientValue = $value;
        }
    }

    public function setCasesOfTarget($week, $districtId, $clinicId, $value)
    {        
        $clinics = $this->districts[$week][$districtId]->getClinics();
        $clinics[$clinicId]->setCasesOfTarget($value);
    }
    
    public function setCasesOfCalc($week, $districtId, $clinicId, $year, $value)
    {
        $clinics = $this->districts[$week][$districtId]->getClinics();
        $clinics[$clinicId]->setCaseOfCalc($year, $value);
    }
    
    public function addClinic($week, $districtId, $clinic)
    {
        $this->districts[$week][$districtId]->addClinic($clinic);
    }
    
    public function removeClinic($week, $districtId, $clinicId)
    {
        $this->districts[$week][$districtId]->removeClinic($clinicId);
    }
    
    public function isToGenerateErrorException()
    {
        if ($this->weekOfYear == 0) // This object will be used in calc coefficient in each district.
            return false;
        return true;
    }
}
