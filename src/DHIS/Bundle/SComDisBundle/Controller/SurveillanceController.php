<?php

namespace DHIS\Bundle\SComDisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use DHIS\Bundle\CommonBundle\Entity\Document;

use DHIS\Bundle\SComDisBundle\Entity\Surveillance;
use DHIS\Bundle\SComDisBundle\Entity\SurveillanceRepository;
use DHIS\Bundle\SComDisBundle\Entity\SurveillanceTrendCriteria;
use DHIS\Bundle\SComDisBundle\Entity\SurveillancePredictionCriteria;

use DHIS\Bundle\SComDisBundle\Form\SurveillanceType;
use DHIS\Bundle\SComDisBundle\Form\OutCARPHAReportType;
use DHIS\Bundle\SComDisBundle\Form\SearchSurveillanceType;
use DHIS\Bundle\SComDisBundle\Form\SurveillanceTrendCriteriaType;
use DHIS\Bundle\SComDisBundle\Form\SurveillancePredictionCriteriaType;

/**
 * SurveillanceController for SComDis site.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @Route("/scomdis/serveillance")
 */
class SurveillanceController extends AppController
{
    /**
     * @Route("/", name="scomdis_surveillance")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $repo = $manager->getRepository('DHISSComDisBundle:Surveillance');
        $query = $repo->createQueryBuilder('r')->orderBy('r.weekend', 'DESC')->getQuery();
        
        $pagenator = $this->get('knp_paginator');
        $pagination = $pagenator->paginate($query, $request->
                query->get('p', 1), 20);
      
        return array(
            'pagination' => $pagination,
        );
     }
    
    /**
     * @Route("/new", name="scomdis_surveillance_new")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $syndromeRepository = $manager->getRepository('DHISSComDisBundle:Syndrome4Surveillance');
        $syndromes = $syndromeRepository->findAll();
        $surveillance = new Surveillance($syndromes);

        $form = $this->createForm(new SurveillanceType(), $surveillance);
        
        $sentinelSiteRepository = $manager->getRepository('DHISSComDisBundle:SentinelSite');
        $sentinelSites = $sentinelSiteRepository->findAll();
        
        $clinicRepository = $manager->getRepository('DHISSComDisBundle:Clinic');
        $clinics = $clinicRepository->findAll();
        
        $manager = $this->get('doctrine')->getEntityManager('common');
        $userRepository = $manager->getRepository('DHISCommonBundle:User');
        $query = $userRepository->createQueryBuilder('r')->orderBy('r.displayname', 'ASC')->getQuery();
        $users = $query->getResult();
        
        if ($request->getMethod() === 'POST') {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            
            if ($form->isValid()) {                
                $request->getSession()->set('scomdis_surveillance/new', $data);
                return $this->redirect($this->generateUrl('scomdis_surveillance_confirm'));
            }
        } else if ($request->getSession()->has('scomdis_surveillance/new')) {
            $data = $request->getSession()->get('scomdis_surveillance/new');
            $data['_token'] = $form['_token']->getData();
            $form->bind($data);
        }
        
        return array(
            'sentinelSites' => $sentinelSites,
            'clinics'       => $clinics,
            'users'         => $users,
            'form'          => $form->createView(),
        );
    }
    
    /**
     * @Route("/confirm", name="scomdis_surveillance_confirm")
     * @Template()
     */
    public function confirmAction(Request $request)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $repo = $manager->getRepository('DHISSComDisBundle:Syndrome4Surveillance');
        $syndromes = $repo->findAll();
        
        $surveillance = new Surveillance($syndromes);
        
        if (!$this->restoreSurveillanceForms($surveillance, array('surveillance',))) {
            return $this->redirect($this->generateUrl('scomdis_surveillance_new'));
        }

        $surveillanceRepository = $manager->getRepository('DHISSComDisBundle:Surveillance');
        
        if ('POST' === $request->getMethod()) {
            try {
                
                $surveillanceRepository->saveSurveillance($surveillance);
                
                $session = $request->getSession();
                $session->remove('scomdis_surveillance/new');
                $message = 'Complete adding the new surveillance. '.
                            $surveillance->getYear().'-'.
                            $surveillance->getWeekOfYear().' '.
                            $surveillance->getClinic().'@'.
                            $surveillance->getSentinelSite();
                $request->getSession()->setFlash('success', $message);

                return $this->redirect($this->generateUrl('scomdis_surveillance'));
            } catch (\InvalidArgumentException $e) {
                $request->getSession()->setFlash('error', $e->getMessage());
            }
        } else {
            if ($surveillanceRepository->isExist($surveillance)) {
                $request->getSession()->setFlash('error', "Warning: This surveillance is already exist.");
            }
        }
        
        return array(
            'surveillance' => $surveillance,
        );
    }
    
    /**
     * @Route("/{id}/show", name="scomdis_surveillance_show", requirements={"id" = "\d+"})
     * @Template()
     */
    public function showAction(Request $request, $id)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $repo = $manager->getRepository('DHISSComDisBundle:Surveillance');
        $surveillance = $repo->find($id);
        
        if (!$surveillance) {
            throw $this->createNotFoundException('No surveillance found for id '.$id);
        }
        
        return array(
            'surveillance' => $surveillance,
        );
    }

    /**
     * @Route("/{id}/edit", name="scomdis_surveillance_edit", requirements={"id" = "\d+"})
     * @Template
     */
    public function editAction(Request $request, $id)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $surveillanceRepository = $manager->getRepository('DHISSComDisBundle:Surveillance');
        $surveillance = $surveillanceRepository->find($id);
        if (!$surveillance) {
            throw $this->createNotFoundException('No surveillance found for id '.$id);
        }
        
        $form = $this->createForm(new SurveillanceType(), $surveillance);
        
        $sentinelSiteRepository = $manager->getRepository('DHISSComDisBundle:SentinelSite');
        $sentinelSites = $sentinelSiteRepository->findAll();
        
        $clinicRepository = $manager->getRepository('DHISSComDisBundle:Clinic');
        $clinics = $clinicRepository->findAll();
        
        $manager = $this->get('doctrine')->getEntityManager('common');
        $userRepository = $manager->getRepository('DHISCommonBundle:User');
        $query = $userRepository->createQueryBuilder('r')->orderBy('r.displayname', 'ASC')->getQuery();
        $users = $query->getResult();
        
        if ($request->getMethod() === 'POST') {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            
            if ($form->isValid()) {
                try {
                    $surveillanceRepository->saveSurveillance($surveillance);
                    $message = 'Updated the surveillance. '.
                            $surveillance->getYear().'-'.
                            $surveillance->getWeekOfYear().' '.
                            $surveillance->getClinic().'@'.
                            $surveillance->getSentinelSite();
                    $request->getSession()->setFlash('success', $message);
                    return $this->redirect(
                            $this->generateUrl('scomdis_surveillance_show', 
                                                array('id' => $surveillance->getId()))
                    );

                } catch (\InvalidArgumentException $e) {
                    $request->getSession()->setFlash('error', $e->getMessage());
                }   
            }
        }
        
        return array(
            'surveillance'  => $surveillance,
            'sentinelSites' => $sentinelSites,
            'clinics'       => $clinics,
            'users'         => $users,
            'form'          => $form->createView(),
        );
    }
    
    /**
     * @Route("/{id}/update", name="scomdis_surveillance_receive", requirements={"id" = "\d+"})
     */
    public function receiveAction(Request $request, $id)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $repo = $manager->getRepository('DHISSComDisBundle:Surveillance');
        $user = $this->get('security.context')->getToken()->getUser();
        
        try {
            
            $repo->receiveSurveillance($id, $user);
            $message = 'Received the surveillance.';
            $request->getSession()->setFlash('success', $message);
            
        } catch (\InvalidArgumentException $e) {
            $request->getSession()->setFlash('error', $e->getMessage());
        }
        
        return $this->redirect($this->generateUrl(
                'scomdis_surveillance_show', array('id' => $id))
        );
    }
    
    /**
     * @Route("/{id}/delete", name="scomdis_surveillance_delete", requirements={"id" = "\d+"})
     */
    public function deleteAction(Request $request, $id)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $repo = $manager->getRepository('DHISSComDisBundle:Surveillance');

        try {
            $repo->deleteSurveillance($id);
            $message = 'Complete deleting the surveillance.';
            $request->getSession()->setFlash('success', $message);
            
        } catch (\InvalidArgumentException $e) {
            $request->getSession()->setFlash('error', $e->getMessage());
        }
        
        return $this->redirect($this->generateUrl('scomdis_surveillance'));
    }
    
    /**
     * @Route("/out_carpha_report", name="scomdis_surveillance_out_carpha_report")
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
    
    /**
     * @Route("/search", name="scomdis_surveillance_search")
     * @Template
     */
    public function searchAction(Request $request)
    {
        $weekend = new \DateTime('last Saturday');
        $weekend->setTime(0, 0, 0);
        
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $sentinelSiteRepository = $manager->getRepository('DHISSComDisBundle:SentinelSite');
        $sentinelSites = $sentinelSiteRepository->findAll();
        
        $clinicRepository = $manager->getRepository('DHISSComDisBundle:Clinic');
        $clinics = $clinicRepository->findAll();

        $form = $this->createForm(new SearchSurveillanceType);
        $form['weekend']->setData($weekend);
        $form['weekOfYear']->setData(strftime('%V', time()));
        $form['year']->setData(strftime('%G', time()));
        
        if ($request->getMethod() === 'POST') {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            
            if ($form->isValid()) {
                $weekend = $form['weekend']->getData();
                $clinic = $form['clinic']->getData();
                
                $manager = $this->get('doctrine')->getEntityManager('scomdis');
                $surveillanceRepository = $manager->getRepository('DHISSComDisBundle:Surveillance');
                $surveillance = $surveillanceRepository->findOneBy(array(
                    'weekend' => $weekend,
                    'clinic' => $clinic
                ));
                
                if ($surveillance) {
                    return $this->redirect($this->generateUrl(
                        'scomdis_surveillance_show', array('id' => $surveillance->getId()))
                    );
                } else {
                    $request->getSession()->setFlash('error', "No surveillance found");
                }
            }
        }
        
        return array(
            'sentinelSites' => $sentinelSites,
            'clinics'       => $clinics,
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("/{id}/out_daily_tally_report", name="scomdis_surveillance_out_daily_tally_report")
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
     * @Route("/trend", name="scomdis_surveillance_trend")
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


                return $this->render('DHISSComDisBundle:Surveillance:chart.html.twig', array(
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
     * @Route("/prediction", name="scomdis_surveillance_prediction")
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
                return $this->render('DHISSComDisBundle:Surveillance:chart.html.twig', array(
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
     * @Route("/gis", name="scomdis_surveillance_gis")
     * @Template
     */
    public function gisAction(Request $request)
    {
        return array();
    }
    
    /**
     * @Route("/import", name="scomdis_surveillance_import")
     * @Template
     */
    public function importAction(Request $request)
    {
        $form = $this->createFormBuilder()
                ->add('attachment', 'file')
                ->getForm()
        ;
        
        if ($request->getMethod() === 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $file = $form['attachment']->getData();
                
                $document = new Document();
                $document->setName($file->getClientOriginalName());
                $document->setFile($file);
                $user = $this->get('security.context')->getToken()->getUser();
                $document->setUser($user);
                
                $manager = $this->get('doctrine')->getEntityManager('common');
                $manager->persist($document);
                $manager->flush();
                
                // Import
                $service = $this->get('surveillance.dailly_tally_import_service');
                if ($service->import($document)) {
                    $message = $service->getImportedRecordsNumber().' Records were successfully imported.';
                    $warnings = $service->getLogWarn();
                    if (count($warnings) > 0)
                        $message = $message.'   Warnings: '.implode(', ', $warnings);
                    $request->getSession()->setFlash('success', $message);
                    return $this->redirect($this->generateUrl('scomdis_surveillance'));
                } else {
                    $request->getSession()->setFlash('error', $service->getErrorMessage());
                    return $this->redirect($this->generateUrl('scomdis_surveillance_import'));
                }
            }
        }
        
        return array('form' => $form->createView());
    }

    /**
     * Restore User data
     * @param User $user
     * @param array $formKeys
     * @return boolean
     * @throws \InvalidArgumentException 
     */
    private function restoreSurveillanceForms(Surveillance $surveillance, array $formKeys) {
        
        $session = $this->getRequest()->getSession();
        
        $factory = $this->get('form.factory');
        $binder = function($type, $data) use($factory, $surveillance) {
            if (isset($data['_token'])) {
                unset($data['_token']);
            }
            $form = $factory->create($type, $surveillance, array('csrf_protection' => false));
            $form->bind($data);
            
            return $form->isValid();
        };
        
        $valid = true;
        foreach ($formKeys as $formKey) {
            switch ($formKey) {
                case 'surveillance':
                    $valid = $binder(new SurveillanceType(),
                                     $session->get('scomdis_surveillance/new'));
                    break;
                default:
                    throw new \InvalidArgumentException(sprintf('Unknown form key "%s"', $formKeys));
            }
            
            if (!$valid) {
                return false;
            }
        }
        
        return true;
    }
    
    /**
     * @Route("/test", name="scomdis_surveillance_test")
     * @Template()
     */
    public function testAction(Request $request)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $syndromeRepository = $manager->getRepository('DHISSComDisBundle:Syndrome4Surveillance');
        $syndromes = $syndromeRepository->findAll();
        $surveillance = new Surveillance($syndromes);

        $form = $this->createForm(new SurveillanceType(), $surveillance);
        
        $sentinelSiteRepository = $manager->getRepository('DHISSComDisBundle:SentinelSite');
        $sentinelSites = $sentinelSiteRepository->findAll();
        
        $clinicRepository = $manager->getRepository('DHISSComDisBundle:Clinic');
        $clinics = $clinicRepository->findAll();
        
        $manager = $this->get('doctrine')->getEntityManager('common');
        $userRepository = $manager->getRepository('DHISCommonBundle:User');
        $query = $userRepository->createQueryBuilder('r')->orderBy('r.displayname', 'ASC')->getQuery();
        $users = $query->getResult();
        
        if ($request->getMethod() === 'POST') {
            $form->bindRequest($request);
            //$data = $request->request->get($form->getName());
            //$form->bind($data);
            
            if ($form->isValid()) {
                $weekofYear = \DHIS\Bundle\SComDisBundle\Entity\CommonUtils::getEPIWeekOfYear($surveillance->getWeekend());
                $year = \DHIS\Bundle\SComDisBundle\Entity\CommonUtils::getEPIYear($surveillance->getWeekend());
            }
        }
        
        return array(
            'sentinelSites' => $sentinelSites,
            'clinics'       => $clinics,
            'users'         => $users,
            'form'          => $form->createView(),
        );

    }
}
