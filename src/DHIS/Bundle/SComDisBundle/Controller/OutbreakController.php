<?php

namespace DHIS\Bundle\SComDisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use DHIS\Bundle\SComDisBundle\Entity\Outbreak;
use DHIS\Bundle\SComDisBundle\Entity\OutbreakRepository;
use DHIS\Bundle\SComDisBundle\Entity\Outbreak2;
use DHIS\Bundle\SComDisBundle\Entity\Outbreak2Repository;

use DHIS\Bundle\SComDisBundle\Form\SearchOutbreakType;

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
        //$repo = $manager->getRepository('DHISSComDisBundle:Outbreak2');
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
        return array();
    }
    
    /**
     * @Route("/confirm", name="scomdis_outbreak_confirm")
     * @Template()
     */
    public function confirmAction(Request $request)
    {
        return array();
    }
    
    /**
     * @Route("/{id}/show", name="scomdis_outbreak_show", requirements={"id" = "\d+"})
     * @Template()
     */
    public function showAction(Request $request, $id)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        //$repo = $manager->getRepository('DHISSComDisBundle:Outbreak2');
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
        return array();
    }
    
    /**
     * @Route("/{id}/delete", name="scomdis_outbreak_delete", requirements={"id" = "\d+"})
     */
    public function deleteAction(Request $request, $id)
    {
        return array();
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
                
                $manager = $this->get('doctrine')->getEntityManager('scomdis');
                $outbreakRepository = $manager->getRepository('DHISSComDisBundle:Outbreak');
                $outbreak = $outbreakRepository->findOneBy(
                    array('weekend' => $weekend),
                    array('clinic' => $clinic)
                );
                
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
            'syndrome'      => $syndromes,
            'form' => $form->createView(),
        );
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
