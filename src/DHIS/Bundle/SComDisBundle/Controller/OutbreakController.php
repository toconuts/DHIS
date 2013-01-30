<?php

namespace DHIS\Bundle\SComDisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use DHIS\Bundle\SComDisBundle\Entity\Outbreak;
use DHIS\Bundle\SComDisBundle\Entity\OutbreakRepository;
//use DHIS\Bundle\SComDisBundle\Entity\Outbreak2;
//use DHIS\Bundle\SComDisBundle\Entity\Outbreak2Repository;

use DHIS\Bundle\SComDisBundle\Form\SearchOutbreakType;
use DHIS\Bundle\SComDisBundle\Form\OutbreakType;

/**
 * OutbreakController fot SComDis site.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @Route("/scomdis/outbreak")
 *
 */
class OutbreakController extends AppController
{
    /**
     * @Route("/", name="scomdis_outbreak")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $repo = $manager->getRepository('DHISSComDisBundle:Outbreak');
        $query = $repo->createQueryBuilder('r')->orderBy('r.weekend', 'DESC')->getQuery();
        
        $pagenator = $this->get('knp_paginator');
        $pagination = $pagenator->paginate($query, $request->
                query->get('p', 1), 20);
      
        return array(
            'pagination' => $pagination,
        );
    }
    
    /**
     * @Route("/new", name="scomdis_outbreak_new")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        
        $outbreak = new Outbreak();
        $form = $this->createForm(new OutbreakType(), $outbreak);
        
        $sentinelSiteRepository = $manager->getRepository('DHISSComDisBundle:SentinelSite');
        $sentinelSites = $sentinelSiteRepository->findAll();
        
        $clinicRepository = $manager->getRepository('DHISSComDisBundle:Clinic');
        $clinics = $clinicRepository->findAll();
        
        $syndromeRepository = $manager->getRepository('DHISSComDisBundle:Syndrome4Outbreak');
        $syndromes = $syndromeRepository->findAll();
        
        $manager = $this->get('doctrine')->getEntityManager('common');
        $userRepository = $manager->getRepository('DHISCommonBundle:User');
        $query = $userRepository->createQueryBuilder('r')->orderBy('r.displayname', 'ASC')->getQuery();
        $users = $query->getResult();

        if ($request->getMethod() === 'POST') {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            
            if ($form->isValid()) {                
                $request->getSession()->set('scomdis_outbreak/new', $data);
                return $this->redirect($this->generateUrl('scomdis_outbreak_confirm'));
            }
        } else if ($request->getSession()->has('scomdis_outbreak/new')) {
            $data = $request->getSession()->get('scomdis_outbreak/new');
            $data['_token'] = $form['_token']->getData();
            $form->bind($data);
        }
        
        return array(
            'sentinelSites' => $sentinelSites,
            'clinics'       => $clinics,
            'syndromes'     => $syndromes,
            'users'         => $users,
            'form'          => $form->createView(),
        );
    }
    
    /**
     * @Route("/confirm", name="scomdis_outbreak_confirm")
     * @Template()
     */
    public function confirmAction(Request $request)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        
        $outbreak = new Outbreak();
        
        if (!$this->restoreOutbreakForms($outbreak, array('outbreak',))) {
            return $this->redirect($this->generateUrl('scomdis_outbreak_new'));
        }
        
        $outbreakRepository = $manager->getRepository('DHISSComDisBundle:Outbreak');
        
        if ('POST' === $request->getMethod()) {
            try {
                
                $outbreakRepository->saveOutbreak($outbreak);
                
                $session = $request->getSession();
                $session->remove('scomdis_outbreak/new');
                $message = 'Complete adding the new outbreak. '.
                            $outbreak->getYear().'-'.
                            $outbreak->getWeekOfYear().' '.
                            $outbreak->getClinic().'@'.
                            $outbreak->getSentinelSite().' '.
                            $outbreak->getSyndrome();
                $request->getSession()->setFlash('success', $message);

                return $this->redirect($this->generateUrl('scomdis_outbreak'));
            } catch (\InvalidArgumentException $e) {
                $request->getSession()->setFlash('error', $e->getMessage());
            }
        } else {
            if ($outbreakRepository->isExist($outbreak)) {
                $request->getSession()->setFlash('error', "Warning: This outbreak is already exist.");
            }
        }
        
        return array(
            'outbreak' => $outbreak,
        );
    }
    
    /**
     * @Route("/{id}/show", name="scomdis_outbreak_show", requirements={"id" = "\d+"})
     * @Template()
     */
    public function showAction(Request $request, $id)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $repo = $manager->getRepository('DHISSComDisBundle:Outbreak');
        $outbreak = $repo->find($id);
        
        if (!$outbreak) {
            throw $this->createNotFoundException('No outbreak daily Tally found for id '.$id);
        }
        
        return array(
            'outbreak' => $outbreak,
        );
    }
    
    /**
     * @Route("/{id}/edit", name="scomdis_outbreak_edit", requirements={"id" = "\d+"})
     * @Template
     */
    public function editAction(Request $request, $id)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $outbreakRepository = $manager->getRepository('DHISSComDisBundle:Outbreak');
        $outbreak = $outbreakRepository->find($id);
        if (!$outbreak) {
            throw $this->createNotFoundException('No outbreak found for id '.$id);
        }
        
        $form = $this->createForm(new OutbreakType(), $outbreak);
        
        $sentinelSiteRepository = $manager->getRepository('DHISSComDisBundle:SentinelSite');
        $sentinelSites = $sentinelSiteRepository->findAll();
        
        $clinicRepository = $manager->getRepository('DHISSComDisBundle:Clinic');
        $clinics = $clinicRepository->findAll();
        
        $syndromeRepository = $manager->getRepository('DHISSComDisBundle:Syndrome4Outbreak');
        $syndromes = $syndromeRepository->findAll();
        
        $manager = $this->get('doctrine')->getEntityManager('common');
        $userRepository = $manager->getRepository('DHISCommonBundle:User');
        $query = $userRepository->createQueryBuilder('r')->orderBy('r.displayname', 'ASC')->getQuery();
        $users = $query->getResult();
        
        if ($request->getMethod() === 'POST') {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            
            if ($form->isValid()) {
                try {
                    $outbreakRepository->saveOutbreak($outbreak);
                    $message = 'Updated the outbreak. '.
                            $outbreak->getYear().'-'.
                            $outbreak->getWeekOfYear().' '.
                            $outbreak->getClinic().'@'.
                            $outbreak->getSentinelSite().' '.
                            $outbreak->getSyndrome();
                    $request->getSession()->setFlash('success', $message);
                    return $this->redirect(
                            $this->generateUrl('scomdis_outbreak_show', 
                                                array('id' => $outbreak->getId()))
                    );

                } catch (\InvalidArgumentException $e) {
                    $request->getSession()->setFlash('error', $e->getMessage());
                }   
            }
        }
        
        return array(
            'outbreak'      => $outbreak,
            'sentinelSites' => $sentinelSites,
            'clinics'       => $clinics,
            'syndromes'     => $syndromes,
            'users'         => $users,
            'form'          => $form->createView(),
        );
    }
    
    /**
     * @Route("/{id}/delete", name="scomdis_outbreak_delete", requirements={"id" = "\d+"})
     */
    public function deleteAction(Request $request, $id)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $repo = $manager->getRepository('DHISSComDisBundle:Outbreak');

        try {
            $repo->deleteOutbreak($id);
            $message = 'Complete deleting the outbreak.';
            $request->getSession()->setFlash('success', $message);
            
        } catch (\InvalidArgumentException $e) {
            $request->getSession()->setFlash('error', $e->getMessage());
        }
        
        return $this->redirect($this->generateUrl('scomdis_outbreak'));
    }
    
    /**
     * @Route("/search", name="scomdis_outbreak_search")
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
        
        $syndromeRepository = $manager->getRepository('DHISSComDisBundle:Syndrome4Outbreak');
        $syndromes = $syndromeRepository->findAll();

        $form = $this->createForm(new SearchOutbreakType());
        $form['weekend']->setData($weekend);
        $form['weekOfYear']->setData(strftime('%V', time()));
        $form['year']->setData(strftime('%G', time()));
        
        $form['syndrome']->setData($syndromes);
        
        if ($request->getMethod() === 'POST') {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            
            if ($form->isValid()) {
                $weekend = $form['weekend']->getData();
                $clinic = $form['clinic']->getData();
                $syndrome = $form['syndrome']->getData();
                
                $manager = $this->get('doctrine')->getEntityManager('scomdis');
                $outbreakRepository = $manager->getRepository('DHISSComDisBundle:Outbreak');
                $outbreak = $outbreakRepository->findOneBy(array(
                    'weekend' => $weekend,
                    'clinic' => $clinic,
                    'syndrome' => $syndrome
                ));
                
                if ($outbreak) {
                    return $this->redirect($this->generateUrl(
                        'scomdis_outbreak_show', array('id' => $outbreak->getId()))
                    );
                } else {
                    $request->getSession()->setFlash('error', "No outbreak found");
                }
            }
        }
        
        return array(
            'sentinelSites' => $sentinelSites,
            'clinics'       => $clinics,
            'syndromes'      => $syndromes,
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
    private function restoreOutbreakForms(Outbreak $outbreak, array $formKeys) {
        
        $session = $this->getRequest()->getSession();
        
        $factory = $this->get('form.factory');
        $binder = function($type, $data) use($factory, $outbreak) {
            if (isset($data['_token'])) {
                unset($data['_token']);
            }
            $form = $factory->create($type, $outbreak, array('csrf_protection' => false));
            $form->bind($data);
            
            return $form->isValid();
        };
        
        $valid = true;
        foreach ($formKeys as $formKey) {
            switch ($formKey) {
                case 'outbreak':
                    $valid = $binder(new OutbreakType(),
                                     $session->get('scomdis_outbreak/new'));
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
     * @Route("/{id}/out_daily_tally_report", name="scomdis_outbreak_out_daily_tally_report")
     * @Template
     */
    public function outDailyTallyReportAction(Request $request, $id)
    {
        return array();
    }
}
