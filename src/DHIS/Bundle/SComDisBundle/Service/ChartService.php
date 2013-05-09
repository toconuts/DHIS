<?php

namespace DHIS\Bundle\SComDisBundle\Service;

use Symfony\Bridge\Doctrine\RegistryInterface;
use DHIS\Bundle\SComDisBundle\Entity\SurveillanceRepository;
use DHIS\Bundle\SComDisBundle\Entity\Surveillance;
Use DHIS\Bundle\SComDisBundle\Entity\SurveillanceTrendCriteria;
use DHIS\Bundle\SComDisBundle\Entity\SurveillancePredictionCriteria;
use DHIS\Bundle\SComDisBundle\Entity\CommonUtils;
use DHIS\Bundle\SComDisBundle\Entity\GoogleLineChart;
use DHIS\Bundle\SComDisBundle\Entity\LineChart;


/**
 * Chart Service for Syndromic Surveillance
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class ChartService
{
    /**
     * @var RegistryInterface $managerRegistry
     */
    private $managerRegistry;

    /**
     * Constructor.
     * 
     * @param RegistryInterface $managerRegistry 
     */
    public function __construct(RegistryInterface $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }
    
    public function createTrendChart(SurveillanceTrendCriteria $criteria)
    {
        $lineChart = new LineChart();
        $lineChart->setTitle("Epidemic Trend");
        
        $data = $this->getTrendChartData($criteria);
        $lineChart->setData($data);
        
        $dataLabels = $this->getSyndromeNames($criteria);
        $lineChart->setSeriesNames($dataLabels);
        
        return $lineChart;
    }
    
    protected function getTrendChartData(SurveillanceTrendCriteria $criteria)
    {
        $manager = $this->managerRegistry->getEntityManager('scomdis');
        $surveillances = $manager->getRepository('DHISSComDisBundle:Surveillance')
                ->findAllByYearAndSentinelSite(
                        $criteria->getYearChoices(),
                        $criteria->getSentinelSites()
                )
        ;
        
        $syndromeChoices = $criteria->getSyndromes();
        $numberOfSeries = $criteria->isUseSeriesSyndromes() ? count($syndromeChoices) : 1;
        $series = array_fill(0, $numberOfSeries, -1);
        
        $week52 = array_fill(1, 52, $series);
        $week53 = array_fill(1, 53, $series);
        $yearChoices =  $criteria->getYearChoices();
        sort($yearChoices);
        
        $trends = array();
        
        for ($i = 0; $i < count($yearChoices); $i++) {
            if (CommonUtils::is53EPIWeekInYear($yearChoices[$i])) {
                $trends[$yearChoices[$i]] = $week53;
            } else {
                $trends[$yearChoices[$i]] = $week52;
            }
        }
        
        foreach ($surveillances as $surveillance) {
            $total = 0;
            for ($i = 0; $i < count($syndromeChoices); $i++) {
                $surveillanceItem = $surveillance->getSurveillanceItemBySyndrome($syndromeChoices[$i]);
                if ($criteria->isUseSeriesSyndromes()) {
                    $trends[$surveillance->getYear()][$surveillance->getWeekOfYear()][$i] +=  $surveillanceItem->getTotal();
                } else {
                    $total += $surveillanceItem->getTotal();
                }
            }
            if ($criteria->isUseSeriesSyndromes() === false) {
                $trends[$surveillance->getYear()][$surveillance->getWeekOfYear()][0] += $total;
            }
        }
        return $trends;
    }

    public function createPredictionChart(SurveillancePredictionCriteria $criteria)
    {
        $lineChart = new LineChart();
        $syndromeNames = implode(",", $this->getSyndromeNames($criteria));
        $lineChart->setTitle("Epidemic Prediction in $syndromeNames");
        
        $targetYearData = $this->getTargetYearData($criteria);
        $predictionData = $this->getPredictionData($targetYearData, $criteria);
        
        $lineChart->setData($predictionData);
        
        $targetYear = $criteria->getTargetYear();
        $dataLabels = array("Number in $targetYear", "Average", "Threshold");
        $lineChart->setSeriesNames($dataLabels);
        
        return $lineChart;
    }
    
    protected function getTargetYearData(SurveillancePredictionCriteria $criteria)
    {        
        $calcYears = $criteria->getYearChoices();
        
        $targetYear = $criteria->getTargetYear();
        $criteria->setYearChoices(array("$targetYear"));
        
        $data = $this->getTrendChartData($criteria);
        
        $criteria->setYearChoices($calcYears);
        
        return $data;
    }
    
    protected function getPredictionData(array $targetYearData, SurveillancePredictionCriteria $criteria)
    {
        // data = [year][week][series = 0]
        $calcData = $this->getTrendChartData($criteria);
        
        $series = array_fill(0, 3/*Number, AVG, Threshold*/, -1);
        
        $weeks = array();
        $prediction = array();

        if (CommonUtils::is53EPIWeekInYear($criteria->getTargetYear())){
            $weeks = array_fill(1, 53, $series);
        } else {
            $weeks = array_fill(1, 52, $series);
        }

        $prediction[$criteria->getTargetYear()] = $weeks;
                
        $yearChoices =  $criteria->getYearChoices();
        sort($yearChoices);

        $useNoRecords = $criteria->isUseNoRecords();
        $confidenceCoefficient = $criteria->getConfidenceCoefficient();

        foreach ($prediction[$criteria->getTargetYear()] as $week => $weekSet) {
            
            $values = array();
            foreach ($yearChoices as $year) {
                if ($calcData[$year][$week][0] !== -1) {
                    $values[] = $calcData[$year][$week][0];
                } else if ($useNoRecords === true) {
                    $values[] = 0;
                }
            }
            
            // Number
            if ($targetYearData[$criteria->getTargetYear()][$week][0] !== -1)
                $prediction[$criteria->getTargetYear()][$week][0] = $targetYearData[$criteria->getTargetYear()][$week][0];
            else
                $prediction[$criteria->getTargetYear()][$week][0] = 0;
            
            if (count($values) !== 0) {
                // Avg
                $prediction[$criteria->getTargetYear()][$week][1] = round((float)(array_sum($values) / count($values)), 2);
                
                // Threshold
                if (count($values) !== 1) { // Because of sample = true = (n - 1) 
                    $prediction[$criteria->getTargetYear()][$week][2] = round($weekSet[1] + 
                        (CommonUtils::staticsStandardDeviation($values, true) 
                        * $confidenceCoefficient), 2);
                }
            }
        }
        
        return $prediction;
    }

    protected function getSyndromeNames($criteria) {
        
        $manager = $this->managerRegistry->getEntityManager('scomdis');
        $repository = $manager->getRepository('DHISSComDisBundle:Syndrome4Surveillance');
        $syndromeChoices = $criteria->getSyndromes();
        $first = true;
        
        $syndromeNames = array();
        for ($i = 0; $i < count($syndromeChoices); $i++) {
            $syndrome = $repository->find($syndromeChoices[$i]);
            if ($criteria->isUseSeriesSyndromes()) {
                $syndromeNames[$i] = $syndrome->getName();
            } else {
                if ($first) {
                    $syndromeNames[0] = $syndrome->getName();
                    $first = false;
                } else {
                    $syndromeNames[0] = $syndromeNames[0] . ', ' . $syndrome->getName();
                }
            }
        }
        return $syndromeNames;
    }
}
