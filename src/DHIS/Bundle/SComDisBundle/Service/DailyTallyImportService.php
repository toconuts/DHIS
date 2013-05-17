<?php

namespace DHIS\Bundle\SComDisBundle\Service;
          
use Symfony\Bridge\Doctrine\RegistryInterface;

use DHIS\Bundle\CommonBundle\Entity\Document;

use DHIS\Bundle\SComDisBundle\Entity\SurveillanceRepository;
use DHIS\Bundle\SComDisBundle\Entity\Surveillance;
use DHIS\Bundle\SComDisBundle\Entity\CommonUtils;

/**
 * Daily Tally Import Service for Syndromic Surveillance
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class DailyTallyImportService
{
    /**
     * @var RegistryInterface $managerRegistry
     */
    private $managerRegistry;
    
    /**
     * @var array $logInfo
     */
    private $logInfo;
    
    /**
     * @var array $logWarn
     */
    private $logWarn;
    
    /**
     * @var string $errorMessage
     */
    private $errorMessage;
    
    /**
     * @var int 
     */
    private $importedRecordsNumber;
    
    private $surveillanceRepository;
    
    private $sentinelSiteRepository;
    
    private $clinicRepository;
    
    private $syndromeRepository;
    
    public static $CNV_TBL_SENTINEL_CODE = array(
        1 => 1,     // MARIGOT
        2 => 2,     // GRAND BAY
        3 => 3,     // ST JOSEPH
        4 => 4,     // LA PLAINE
        5 => 5,     // CASTLE BRUCE
        6 => 6,     // POTSMOUTH
        7 => 7,     // ROSEAU
        8 => 8,     // PMH
                    // 9 is ROSS UNIVERSITY but only exists new system
    );
    
    public static $CNV_TBL_CLINIC_CODE = array(
        /* MARIGOT */
        'M1' => 101,
        'M2' => 102,
        'M3' => 103,
        'M4' => 104,
        'M5' => 105,
        
        /* GRAND BAY */
        'G1' => 201,
        'G2' => 202,
        'G3' => 203,
        'G4' => 204,
        'G5' => 205,
        
        /* ST JOSEPH */
        'J1' => 301,
        'J2' => 302,
        'J3' => 303,
        'J4' => 304,
        'J5' => 305,
        
        /* LA PLAINE */
        'L1' => 401,
        'L2' => 402,
        'L3' => 403,
        'L4' => 404,
        'L5' => 405,
        
        /* CASTLE BRUCE */
        'C1' => 501,
        'C2' => 502,
        'C3' => 503,
        'C4' => 504,
        'C5' => 505,
        
        /* PORTSMOUTH */
        'P1' => 601,
        'P2' => 602,
        'P3' => 603,
        'P4' => 604,
        'P5' => 605,
        'P6' => 606,
        'P7' => 607,
        'P8' => 608,
        
        /* ROSEAU */
        'RC'  => 701,
        'RN1' => 702,
        'RN2' => 703,
        'RN3' => 704,
        'RN4' => 705,
        'RN5' => 706,
        'RS1' => 707,
        'RS2' => 708,
        'RS3' => 709,
        'RS4' => 710,
        'RV1' => 711,
        'RV2' => 712,
        'RV3' => 713,
        'RV4' => 714,
        'RV5' => 715,
        'RV6' => 716,
        'RV7' => 717,
        
        /* PMH */
        '2' => 802,
        '3' => 803,
        '4' => 804,
        '5' => 805,
        
        /* ROSS UNIVERSITY */
        'P9' => 901,    // also need to change sentinel code 6 -> 9

    );
    
    public static $CNV_TBL_SYNDROME_OFFSET = array(
         1 =>  5,   // Gastroenteritis < 5
         2 => 13,   // Gastroenteritis >= 5
         3 => 21,   // Undifferentiated Fever < 5
         4 => 29,   // Undifferentiated Fever >= 5
         5 => 37,   // Ferver & Neurological Symptoms
         6 => 45,   // Ferver & Hemorrhagic Symptoms
         7 => 53,   // ARI < 5
         8 => 61,   // ARI >= 5
         9 => 77,   // Skin Rash
        10 => 69,   // Conjunctivitis
        11 => 85,   // Genital Discharge
        12 => 93,   // Genital Ulcer
    );
    
    /**
     * Constructor.
     * 
     * @param RegistryInterface $managerRegistry 
     */
    public function __construct(RegistryInterface $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
        $this->logInfo = array();
        $this->logWarn = array();
        $this->errorMessage = '';
        $this->importedRecordsNumber = 0;
    }
    
    /**
     * @return array 
     */
    public function getLogInfo()
    {
        return $this->logInfo;
    }
    
    /**
     * @return array
     */
    public function getLogWarn()
    {
        return $this->logWarn;
    }
    
    /**
     * @return array
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
    
    /**
     * @return int
     */
    public function getImportedRecordsNumber()
    {
        return $this->importedRecordsNumber;
    }
    
    /**
     * Import
     * 
     * @param Document $document
     * @param boolean $isLegacy
     * @return boolean
     */
    public function import(Document $document, $isLegacy = true)
    {
        set_time_limit(600);
        ini_set("memory_limit", "1G");
        
        $manager = $this->managerRegistry->getEntityManager('common');
        
        $this->clear();
        $this->logInfo("Start Importing");
        
        $result = false;
        
        if ($isLegacy) {
            $result = $this->importFromLegacySys($document);    
        } else {
            $result = $this->importFromNewSys($document);
        }
        
        // Update status of the importing
        $document->setStatus($result ? "Success" : "Failure");
        $manager->persist($document);
        $manager->flush();
        
        $this->logInfo("End Importing. Sutatus: ". ($result ? 'Success' : 'Failure'));
        
        return $result;
    }
    
    protected function importFromLegacySys(Document $document)
    {
        $manager = $this->managerRegistry->getEntityManager('scomdis');
        $this->surveillanceRepository = $manager->getRepository('DHISSComDisBundle:Surveillance');
        $this->sentinelSiteRepository = $manager->getRepository('DHISSComDisBundle:SentinelSite');
        $this->clinicRepository = $manager->getRepository('DHISSComDisBundle:Clinic');
        $this->syndromeRepository = $manager->getRepository('DHISSComDisBundle:Syndrome4Surveillance');     
        $syndromes = $this->syndromeRepository->findAll();
        
        try {
            $manager->getConnection()->beginTransaction();
        
            $filepath = $document->getAbsolutePath();
            $handle = fopen($filepath, "r");
            while ($csv = fgetcsv($handle)) {
                $res = mb_convert_variables("UTF-8", "SJIS-win", $csv);
                if (!$res) {
                    $message = "Importing Error Occured. Can not convert Multi Byte. ID:".$csv[0];
                    throw new \InvalidArgumentException($message);
                }
                
                $surveillance = new Surveillance($syndromes);
                $res = $this->convert($surveillance, $csv);
                if ($res) {
                    try {
                        $this->surveillanceRepository->saveSurveillance($surveillance);
                    } catch (\InvalidArgumentException $e) {
                        $message = $e->getMessage()." - ID: ".$csv[0]." Sentinel: ".$csv[1]." Clinic: ".$csv[2];
                        throw new \InvalidArgumentException($message);
                    }
                    $this->importedRecordsNumber++;
                    $this->logInfo("Import Record - ID: ".$csv[0]." Sentinel: ".$csv[1]." Clinic: ".$csv[2]);
                } else {
                    // Not error, only ignore this record.
                    $this->logWarn("Ignore Record - ID: ".$csv[0]." Sentinel: ".$csv[1]." Clinic: ".$csv[2]);
                }
            }
            
            $manager->getConnection()->commit();
            
        } catch (\Exception $e) {
            $manager->getConnection()->rollback();
            $this->errorMessage = $e->getMessage();
            return false;
        }
        return true;
    }
    
    protected function convert(Surveillance $surveillance, $csv)
    {
        // Check the record
        $bool1 = empty($csv[1]);
        $bool1 = $csv[1] === "0" ? true : false;
        $bool1 = empty($csv[2]);
        $bool1 = $csv[2] === "0" ? true : false;
        
        if ((empty($csv[1]) || $csv[1] === "0") || (empty($csv[2]) || $csv[2] === "0" ))
            return false;
        
        $weekend = new \DateTime($csv[3]);
        $weekend->setTime(0, 0, 0);
        if (2004 > CommonUtils::getEPIYear($weekend))
            return false;

        // Clinic
        $clinicId = self::$CNV_TBL_CLINIC_CODE[$csv[2]];
        $clinic = $this->clinicRepository->find($clinicId);
        $surveillance->setClinic($clinic);
        
        // Sentinel Site
        $sentinelSiteId = self::$CNV_TBL_SENTINEL_CODE[$csv[1]];
        if ($clinicId === 901) // ROSS Univ.
            $sentinelSiteId = 9;
        $sentinelSite = $this->sentinelSiteRepository->find($sentinelSiteId);
        $surveillance->setSentinelSite($sentinelSite);
        
        // weekend     
        $surveillance->setWeekend($weekend);
        
        // week_of_year & year
        $surveillance->setWeekNumber($weekend);
        
        // Reported_by
        $surveillance->setReportedBy('Imported by system');
        
        // Reported_at
        if (CommonUtils::isDate($csv[4])) {
            $surveillance->setReportedAt(new \DateTime($csv[4]));
        } else {
            $surveillance->setReportedAt(clone $weekend);
        }
        
        // Received_at and Received_by
        if (CommonUtils::isDate($csv[101])) {
            $surveillance->setReceivedAt(new \DateTime($csv[101]));
            $surveillance->setReceivedBy('Epidemiologist');
        }
        
        // Serveillance Items
        $surveillanceItems = $surveillance->getSurveillanceItems();
        foreach ($surveillanceItems as $surveillanceItem) {
            $id = $surveillanceItem->getSyndrome()->getId();
            if (0 < $id && $id < 13) {
                $offset = self::$CNV_TBL_SYNDROME_OFFSET[$id];
                $surveillanceItem->setSunday(   $csv[$offset + 0]);
                $surveillanceItem->setMonday(   $csv[$offset + 1]);
                $surveillanceItem->setTuesday(  $csv[$offset + 2]);
                $surveillanceItem->setWednesday($csv[$offset + 3]);
                $surveillanceItem->setThursday( $csv[$offset + 4]);
                $surveillanceItem->setFriday(   $csv[$offset + 5]);
                $surveillanceItem->setSaturday( $csv[$offset + 6]);
                $surveillanceItem->setReferrals($csv[$offset + 7]);
            }
        }
        
        return true;
    }    
    
    protected function importFromNewSys(Document $document)
    {
        // This function is only place holder that might be used on enhancement.
        return $document;
    }
    
    protected function clear()
    {
        $this->logInfo = array();
        $this->logWarn = array();
        $this->errorMessage = '';
        $this->importedRecordsNumber = 0;
    }
    
    protected function logInfo($message)
    {
        $this->logInfo[] = $message;
    }
    
    protected function logWarn($message)
    {
        $this->logWarn[] = $message;
    }
}