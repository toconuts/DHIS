<?php

namespace DHIS\Bundle\SComDisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
//use JMS\SecurityExtraBundle\Annotation\Secure;

use DHIS\Bundle\SComDisBundle\Form\OutCARPHAReportType;

/**
 * ReportController for SComDis site.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @Route("/scomdis/report")
 */
class ReportController extends AppController
{
    /**
     * @Route("/{id}/daily_tally", name="scomdis_report_daily_tally")
     * @Template
     */
    public function outDailyTallyReportAction(Request $request, $id)
    {              
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $surveillanceRepository = $manager->getRepository('DHISSComDisBundle:Surveillance');
        $surveillance = $surveillanceRepository->find($id);
        if (!$surveillance) {
            throw $this->createNotFoundException('No surveillance found for clinic');
        }

        $filename = __DIR__.'/../Data/SComdis_DailyTally.xls';
        if (!file_exists($filename)) {
            throw $this->createNotFoundException('No template found.');
        }

        // Create the response
        $response = new \Symfony\Component\HttpFoundation\Response();
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment;filename=SComDis_Daily_Tally.xls');
        $response->headers->set('Cache-Control', 'ax-age=0');
        $response->prepare();
        $response->sendHeaders();

        // Output the report
        $service = $this->get('surveillance.dailly_tally_report_service');
        $service->outReport($filename, $surveillance);

        return $response;
    }
    
    /**
     * @Route("/carpha_weekly", name="scomdis_report_carpha_weekly")
     * @Template
     */
    public function outCARPHAReportAction(Request $request)
    {
        $weekend = new \DateTime('last Saturday');
        $weekend->setTime(0, 0, 0);
        
        $form = $this->createForm(new OutCARPHAReportType());
        $form['weekend']->setData($weekend);
        $form['weekOfYear']->setData(strftime('%V', time()));
        $form['year']->setData(strftime('%G', time()));
        
        if ($request->getMethod() === 'POST') {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            
            if ($form->isValid()) {
            
                $weekend = $form['weekend']->getData();
                $weekOfYear = $form['weekOfYear']->getData();
                //$year = $form['year']->getData();
                $totalSites = $form['totalSites']->getData();
                
                $filename = __DIR__.'/../Data/SComdis_CARPHAWEEKLY.xls';
                if (!file_exists($filename)) {
                    throw $this->createNotFoundException('No template found');
                }
                    
                // Create the response
                $response = new \Symfony\Component\HttpFoundation\Response();
                $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
                $response->headers->set('Content-Disposition', 'attachment;filename=SComDis_CARPHA_WEEKLY.xls');
                $response->headers->set('Cache-Control', 'ax-age=0');

                // If you are using a https connection, you have to set those two headers for compatibility with IE <9
                //$response->headers->set('Pragma', 'public');
                //$response->headers->set('Cache-Control', 'maxage=1');

                $response->prepare();
                $response->sendHeaders();

                // Output the report
                $service = $this->get('surveillance.carpha_report_service');
                $service->outReport($filename, $weekOfYear, $weekend, $totalSites);

                return $response;
            }
        }

        return array(
            'form' => $form->createView(),
        );
    }
}
