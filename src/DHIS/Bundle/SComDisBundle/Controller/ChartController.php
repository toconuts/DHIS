<?php

namespace DHIS\Bundle\SComDisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use DHIS\Bundle\SComDisBundle\Entity\SurveillanceTrendCriteria;
use DHIS\Bundle\SComDisBundle\Entity\SurveillancePredictionCriteria;
use DHIS\Bundle\SComDisBundle\Entity\SurveillanceCoefficientCriteria;

use DHIS\Bundle\SComDisBundle\Form\SurveillanceTrendCriteriaType;
use DHIS\Bundle\SComDisBundle\Form\SurveillancePredictionCriteriaType;
use DHIS\Bundle\SComDisBundle\Form\SurveillanceCoefficientCriteriaType;

/**
 * ChartController for SComDis site.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @Route("/scomdis/chart")
 */
class ChartController extends AppController
{
    /**
     * @Route("/trend", name="scomdis_chart_trend")
     * @Template
     */
    public function trendAction(Request $request)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $syndromeRepositry = $manager->getRepository('DHISSComDisBundle:Syndrome4Surveillance');
        $syndromes = $syndromeRepositry->findAll();
        $sentinelSiteRepository = $manager->getRepository('DHISSComDisBundle:SentinelSite');
        $sentinelSites = $sentinelSiteRepository->findAll();
        $criteria = new SurveillanceTrendCriteria($syndromes, $sentinelSites);
        
        $form = $this->createForm(new SurveillanceTrendCriteriaType(), $criteria);
        
        if ($request->getMethod() === 'POST') {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            if ($form->isValid()) {
                
                // Get chart data from service
                $service = $this->get('surveillance.chart_service');
                $lineChart = $service->createTrendChart($criteria);

                return $this->render('DHISSComDisBundle:Chart:chart.html.twig', array(
                    'lineChart' => $lineChart,
                    'year_choices' => $criteria->getYearChoices(),
                    'syndrome_choices' => $criteria->getSyndromes(),
                    'sentinelSite_choices' => $criteria->getSentinelSites(),
                    'syndromes' => $syndromes,
                    'sentinelSites' => $sentinelSites,
                ));
            }
        }
        
        return array(
            'yearChoices' => $criteria->getYearChoices(),
            'syndromes' => $syndromes,
            'sentinelSites' => $sentinelSites,
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("/prediction", name="scomdis_chart_prediction")
     * @Template
     */
    public function predictionAction(Request $request)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $syndromeRepositry = $manager->getRepository('DHISSComDisBundle:Syndrome4Surveillance');
        $syndromes = $syndromeRepositry->findAll();
        $sentinelSiteRepository = $manager->getRepository('DHISSComDisBundle:SentinelSite');
        $sentinelSites = $sentinelSiteRepository->findAll();
        $criteria = new SurveillancePredictionCriteria($syndromes, $sentinelSites);
        
        $form = $this->createForm(new SurveillancePredictionCriteriaType(), $criteria);
        
        if ($request->getMethod() === 'POST') {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            if ($form->isValid()) {
                
                // Get chart data from service
                $service = $this->get('surveillance.chart_service');
                $lineChart = $service->createPredictionChart($criteria);
                $useNoRecords = $criteria->isUseNoRecords() ? "on" : "off";
                $note = "no records as 0 case option = $useNoRecords";
                return $this->render('DHISSComDisBundle:Chart:chart.html.twig', array(
                    'lineChart' => $lineChart,
                    'year_choices' => array($criteria->getTargetYear()),
                    'calcYears' => $criteria->getYearChoices(),
                    'syndrome_choices' => $criteria->getSyndromes(),
                    'sentinelSite_choices' => $criteria->getSentinelSites(),
                    'syndromes' => $syndromes,
                    'sentinelSites' => $sentinelSites,
                    'note' => $note,
                ));                
            }
        }
        
        return array(
            'yearChoices' => $criteria->getYearChoices(),
            'syndromes' => $syndromes,
            'sentinelSites' => $sentinelSites,
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("/coefficient", name="scomdis_chart_coefficient")
     * @Template
     */
    public function coefficientAction(Request $request)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $syndromeRepositry = $manager->getRepository('DHISSComDisBundle:Syndrome4Surveillance');
        $syndromes = $syndromeRepositry->findAll();
        
        $criteria = new SurveillanceCoefficientCriteria($syndromes);
        
        $form = $this->createForm(new SurveillanceCoefficientCriteriaType(), $criteria);
        
        if ($request->getMethod() === 'POST') {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            if ($form->isValid()) {

                // Get epidemic phase object from service.
                $service = $this->get('surveillance.epidemic_phase_service');
                $epidemicPhase = $service->createSeasonalCoefficient($criteria);
                $messages = $epidemicPhase->getMessages();
                if (count($messages) > 0) {
                    $request->getSession()->setFlash('warn', "Warnings: " . implode(', ', $messages));
                }
                
                return $this->render('DHISSComDisBundle:Chart:seasonalCoefficient.html.twig', array(
                    'epidemicPhase' => $epidemicPhase,
                ));

            }
        }
        
        return array(
            'yearChoices' => $criteria->getYearChoices(),
            'syndromes' => $syndromes,
            'form' => $form->createView(),
        );
    }

}
