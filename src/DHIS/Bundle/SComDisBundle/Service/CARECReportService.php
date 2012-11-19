<?php

namespace DHIS\Bundle\SComDisBundle\Service;

use Symfony\Bridge\Doctrine\RegistryInterface;
use DHIS\Bundle\SComDisBundle\Entity\SurveillanceRepository;
use DHIS\Bundle\SComDisBundle\Entity\Surveillance;
/**
 * CAREC Weekly Report Service for Syndromic Surveillance
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class CARECReportService
{
    /**
     * @var type RegistryInterface
     */
    private $managerRegistry;
    
    /**
     * @var string 
     */
    private $weekOfYear;
    
    /**
     * @var DateTime
     */
    private $weekend;
    
    /**
     * @var string
     */
    private $totalSites;
    
    /**
     * @var int
     */
    private $reportSites;
    
    /**
     * @var array 
     */
    private $syndrome;

    /**
     * Constructor.
     * 
     * @param RegistryInterface $managerRegistry 
     */
    public function __construct(RegistryInterface $managerRegistry)
    {
        $this->totalSites = 0;
        $this->reportSites = 0;
        
        $this->managerRegistry = $managerRegistry;
        $manager = $this->managerRegistry->getEntityManager('scomdis');
        $syndromes = $manager->getRepository('DHISSComDisBundle:Syndrome4Surveillance')->findAll();
        foreach ($syndromes as $syndrome) {
            $this->syndrome[$syndrome->getId()] = 0;
        }
    }
    
    /**
     * Set report values.
     * 
     * @param string $weekOfYear
     * @param DateTime $weekend
     * @param string $totalSites
     * @throws \InvalidArgumentException 
     */
    protected function setReportValues()
    {
        $manager = $this->managerRegistry->getEntityManager('scomdis');
        $surveillanceRepository = $manager->getRepository('DHISSComDisBundle:Surveillance');
        $surveillances = $surveillanceRepository->findBy(
                array('weekend' => $this->weekend)
        );
        
        $this->reportSites = count($surveillances);
        
        foreach ($surveillances as $surveillance) {
            foreach ($surveillance->surveillanceItems as $item) {
                $this->syndrome[$item->getSyndrome()->getId()] += $item->getTotal();
            }
        }
    }
    
    /**
     * Output CAREC Weekly Report.
     * 
     * @param string $filename 
     */
    public function outReport($filename, $weekOfYear, $weekend, $totalSites)
    {
        $this->weekOfYear = $weekOfYear;
        $this->weekend = $weekend;
        $this->totalSites = $totalSites;
        $this->setReportValues();
        
        $reader = \PHPExcel_IOFactory::createReader("Excel5");
        $book = $reader->load($filename);

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $book->setActiveSheetIndex(0);
        $sheet = $book->getActiveSheet();

        $this->setCells($sheet);
          
        $writer = \PHPExcel_IOFactory::createWriter($book, "Excel5");
        $writer->save('php://output');
    }
    
    /**
     * Set cells on the excel sheet.
     * 
     * @param type $sheet 
     */
    protected function setCells($sheet) {
        // Week of year
        $sheet->setCellValue('B7', $this->weekOfYear);
        
        // Weekend
        $sheet->setCellValue('B8', $this->weekend->format('d/m/y'));
        
        // Total number of reporting sites
        $sheet->setCellValue('H7', $this->totalSites);
        
        // Number of sites reporting this week
        $sheet->setCellValue('H8', $this->reportSites);
        
        // Fever and haemorrhagic
        $sheet->setCellValue('G12', $this->syndrome[6]);
        
        // Fever and neurological
        $sheet->setCellValue('G13', $this->syndrome[5]);
        
        // ARI < 5
        $sheet->setCellValue('G14', $this->syndrome[7]);
        
        // ARI >= 5
        $sheet->setCellValue('G15', $this->syndrome[8]);
        
        // Gastroenteritis < 5
        $sheet->setCellValue('G16', $this->syndrome[1]);
        
        // Gastroenteritis >= 5
        $sheet->setCellValue('G17', $this->syndrome[2]);
        
        // Undifferentiated Fever < 5
        $sheet->setCellValue('G18', $this->syndrome[3]);
        
        // Undifferentiated Fever >= 5
        $sheet->setCellValue('G19', $this->syndrome[4]);
    }
}
