<?php

namespace DHIS\Bundle\SComDisBundle\Entity;

use DHIS\Bundle\CommonBundle\Entity\CommonUtilsBase;

/**
 * CommonUtils
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 *
 */
class CommonUtils extends CommonUtilsBase
{

    /**
     * Year when surveillance starts
     * 
     * @var int $BEGINING_YEAR 
     */
    public static $BEGINING_YEAR = 2004;
    
    public static $SECONDS_IN_A_DAY = 86400;
    
    public static $DAYS_IN_A_WEEK = 7;

    public static function is53EPIWeekInYear($year)
    {
        $lastWednesday = new \DateTime("last wed of December $year");
        $firstday = new \DateTime("first day of January $year");

        $numberOfWeek = \floor(\round(((int)$lastWednesday->format('U')
                              - (int)$firstday->format('U')) 
                              / self::$SECONDS_IN_A_DAY)
                              / self::$DAYS_IN_A_WEEK) + 1;

        if ($numberOfWeek == "53")
            return true;
        return false;
    }
    
    public static function getEPIWeekOfYear($dateTime) {
        $firstday = new \DateTime("first day of January $year");
        $numberOfWeek = \floor(\round(((int)$dateTime->format('U')
                              - (int)$firstday->format('U')) 
                              / self::$SECONDS_IN_A_DAY)
                              / self::$DAYS_IN_A_WEEK) + 1;
        return $numberOfWeek;
    }
    
    public static function getEPIYear($dataTime) {
        $weekOfYear = self::getEPIWeekOfYear($dateTime);
        $year = (int)$dataTime->format('Y');
        
        // Adjust year to EPI Week
        $month = (int)$dateTime->format('n');
        if ($weekOfYear >= 52 && $month == 1) {
            $year -=1;
        }
        return $year;
    }
    
    public static function staticsStandardDeviation(array $values, $sample = false)
    {
        $mean = (float)(array_sum($values) / count($values));
        $variance = 0.0;
        foreach ($values as $value) {
            $variance += pow($value - $mean, 2);
        }
        $variance /= ($sample ? count($values) - 1 : count($values));
        return (float)sqrt($variance);
    }
}
