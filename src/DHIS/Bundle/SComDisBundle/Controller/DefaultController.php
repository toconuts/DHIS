<?php

namespace DHIS\Bundle\SComDisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use DHIS\Bundle\SComDisBundle\Entity\Surveillance;
use DHIS\Bundle\SComDisBundle\Entity\SurveillanceRepository;

use DHIS\Bundle\SComDisBundle\Form\SurveillanceType;
use DHIS\Bundle\SComDisBundle\Form\SearchSurveillanceType;      

/**
 * DefaultController for SComDis site.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @Route("/scomdis")
 */
class DefaultController extends AppController
{
    /**
     * @Route("/", name="scomdis")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
    
    /**
     * @Route("/list", name="scomdis_list")
     * @Template()
     */
    public function listAction(Request $request)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $repo = $manager->getRepository('DHISSComDisBundle:Surveillance');
        $query = $repo->createQueryBuilder('r')->orderBy('r.weekend', 'DESC')->getQuery();
        
        $pagenator = $this->get('knp_paginator');
        $pagination = $pagenator->paginate($query, $request->
                query->get('p', 1), 100);
      
        return array(
            'pagination' => $pagination,
        );
     }
    
    /**
     * @Route("/new", name="scomdis_new")
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
                return $this->redirect($this->generateUrl('scomdis_confirm'));
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
     * @Route("/confirm", name="scomdis_confirm")
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

                return $this->redirect($this->generateUrl('scomdis_list'));
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
     * @Route("/{id}/show", name="scomdis_show", requirements={"id" = "\d+"})
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
     * @Route("/{id}/edit", name="scomdis_edit", requirements={"id" = "\d+"})
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
                            $this->generateUrl('scomdis_show', 
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
     * @Route("/{id}/update", name="scomdis_receive", requirements={"id" = "\d+"})
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
                'scomdis_show', array('id' => $id))
        );
    }
    
    /**
     * @Route("/{id}/delete", name="scomdis_delete", requirements={"id" = "\d+"})
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
        
        return $this->redirect($this->generateUrl('scomdis_list'));
    }
    
    /**
     * @Route("/search", name="scomdis_search")
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
                        'scomdis_show', array('id' => $surveillance->getId()))
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
     * @Route("/test", name="scomdis_test")
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
