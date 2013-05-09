<?php

namespace DHIS\Bundle\CommonBundle\Entity;

/**
 * CommonUtilsBase is a base class used for 
 * a CommonUtils in each Bundle.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 *
 */
class CommonUtilsBase
{
    private function __construct() {}
    
    public static function isDate($date) {
        try {
            new \DateTime($date);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
