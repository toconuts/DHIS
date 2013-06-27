<?php

namespace DHIS\Bundle\SComDisBundle\Entity;


/**
 * LineChart.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 */
class LineChart
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
     * @var array $calcYears
     */
    private $calcYears;
    
    /**
     * @var array seriesNames;
     */
    private $seriesNames;
    
    /**
     * $data[year][week][series]
       
     * @var array $data
     */
    private $data;
    
    /**
     * $lineChartData[] = array(index, series1, series2, series3,...seriesN)
     * 
     * @var array $lineChartData
     */
    private $lineChartData;
    
    /**
     * @var int $maxValue
     */
    private $maxValue;
    
    /**
     * @var boolean $useSeriesSyndromes
     */
    private $useSeriesSyndromes;
    
    /**
     * @var boolean $isUseNorecord
     */
    private $useNoRecord;
    
    /**
     * @var array $syndromes
     */
    private $syndromes;
    
    /**
     * @var array $sentinelSites;
     */
    Private $sentinelSites;
    
    /**
     * @var array $messages;
     */
    private $messages;
    
    public function __construct($year, $calcYears, $useNorecord, $useSeriesSyndromes = false)
    {
        $this->chartTitle = "Chart Title";
        $this->year = $year;
        $this->calcYears = $calcYears;
        $this->useNoRecord = $useNorecord;
        $this->useSeriesSyndromes = $useSeriesSyndromes;
        
        $this->seriesNames = array();
        
        $this->data = array();
        $this->lineChartData = array();
        
        $this->maxValue = 0;
        
        $this->sentinelSites = array();
        $this->syndromes = array();
        
        $this->messages = array();
    }
    
    public function getYear()
    {
        return $this->year;
    }
    
    public function getCalcYears()
    {
        return $this->calcYears;
    }
    
    public function setSeriesNames(array $names) {
        $this->seriesNames = array();
        $this->seriesNames[0] = 'x';
        foreach ($names as $index => $name) {
            $this->seriesNames[$index + 1] = $name;
        }
    }
    
    public function getSeriesNames() {
        return $this->seriesNames;
    }
    
    public function setData(array $data)
    {
        $this->data = $data;
        $this->createLineChartData();
    }
    
    public function createLineChartData()
    {
        // $this->data[year][week][series]
        // $this->lineChartData[] = array(index, series1, series2, series3,...seriesN)
        
        $this->maxValue = 0;
        $this->lineChartData = array();
        
        $index = 0;
        foreach ($this->data as $numberOfYear => $year) {
            foreach ($year as $numberOfWeek => $week) {
                if ($numberOfWeek === 1) {
                    $this->lineChartData[$index][0] = "$numberOfYear-$numberOfWeek";
                } elseif ($this->isLabeledWeek ($numberOfWeek)) {
                    $this->lineChartData[$index][0] = (string)$numberOfWeek;
                } else {
                    $this->lineChartData[$index][0] = '';
                }
                foreach ($week as $series => $value) {
                    $this->lineChartData[$index][$series + 1] = $value;
                    $this->updateMaxValue($value);
                }
                $index++;
            }
        }
    }
    
    public function getData() {
        return $this->data;
    }
    
    public function getLineChartData() {
        return $this->lineChartData;
    }
    
    public function setMaxValue($value) {
        $this->maxValue = $value;
    }
    
    public function getMaxValue() {
        return $this->maxValue;
    }
    
    public function setTitle($value) {
        $this->title = $value;
    }
    
    public function getTitle() {
        return $this->title;
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
    
    public function getSyndromes()
    {
        return $this->syndromes;
    }
    
    /**
     * Add sentinelSite
     *
     * @param SentinelSite $sentinelSite
     */
    public function addSentinelSite(SentinelSite $sentinelSite)
    {
        $this->sentinelSites[] = $sentinelSite;
    }
    
    /**
     * Set sentinelSites
     *
     * @param array $sentinelSites
     */
    public function setSentinelSites($sentinelSites)
    {
        $this->sentinelSites = $sentinelSites;
    }
    
    /**
     * Get sentinelSites
     *
     * @return array $sentinelSites
     */
    public function getSentinelSites()
    {
        return $this->sentinelSites;
    }
    
    public function addMessage($message)
    {
        $this->messages[] = $message;
    }
    
    public function getMessages()
    {
        return $this->messages;
    }
    
    public function isUseNoRecord()
    {
        return $this->useNoRecord;
    }
    
    public function isUseSeriesSyndromes()
    {
        return $this->useSeriesSyndromes;
    }


    protected function isLabeledWeek($week) {
        if ($week ==  1 || 
            $week ==  5 || 
            $week ==  9 || 
            $week == 13 || 
            $week == 17 ||
            $week == 21 || 
            $week == 25 || 
            $week == 29 || 
            $week == 33 || 
            $week == 37 ||
            $week == 41 || 
            $week == 45 || 
            $week == 49) {
            return true;
        }
        return false;
    }
    
    protected function updateMaxValue($value) {
        if ($this->maxValue < $value)
            $this->maxValue = $value;
    }

}
