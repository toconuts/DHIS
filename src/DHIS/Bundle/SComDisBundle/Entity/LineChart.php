<?php

namespace DHIS\Bundle\SComDisBundle\Entity;


/**
 * Description of LineChart
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class LineChart
{
    private $seriesNames;
    
    private $data;
    
    private $maxValue;

    private $title;
    
    public function __construct()
    {
       $this->seriesNames = array();
       $this->data = array();
       $this->maxValue = 0;
       $this->chartTitle = "Chart Title";
       $this->maxValue = 0;
    }
    
    public function setSeriesNames(array $names) {
        $this->seriesNames = array();
        $this->seriesNames[0] = 'x';
        foreach ($names as $index => $name) {
            $this->seriesNames[$index + 1] = $name;
        }
    }
    
    public function getSeries() {
        return $this->seriesNames;
    }
    
    public function setData(array $data) {
        // $data[year][week][series]
        // $this->data[] = array(index, series1, series2, series3,...seriesN)
        
        $this->maxValue = 0;
        $this->data = array();
        
        $index = 0;
        foreach ($data as $numberOfYear => $year) {
            foreach ($year as $numberOfWeek => $week) {
                if ($numberOfWeek === 1) {
                    $this->data[$index][0] = "$numberOfYear-$numberOfWeek";
                } elseif ($this->isLabeledWeek ($numberOfWeek)) {
                    $this->data[$index][0] = (string)$numberOfWeek;
                } else {
                    $this->data[$index][0] = '';
                }
                foreach ($week as $series => $value) {
                    $this->data[$index][$series + 1] = $value;
                    $this->updateMaxValue($value);
                }
                $index++;
            }
        }
    }
    
    public function getData() {
        return $this->data;
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
