<?php

namespace DHIS\Bundle\SComDisBundle\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use DHIS\Bundle\SComDisBundle\Entity\SentinelSite;
use DHIS\Bundle\SComDisBundle\Form\Admin\SentinelSite\SentinelSiteRegistrationType;
use DHIS\Bundle\SComDisBundle\Form\Admin\SentinelSite\SentinelSiteEditType;

/**
 * SentinelSiteController for SComDis Admin site.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @Route("/admin/sentinel_site")
 */
class SentinelSiteController extends AdminAppController
{
    /**
     * @Route("/", name="scomdis_admin_sentinel_site")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $repo = $manager->getRepository('DHISSComDisBundle:SentinelSite');
        $query = $repo->createQueryBuilder('r')->orderBy('r.id', 'ASC')->getQuery();
        
        $pagenator = $this->get('knp_paginator');
        $pagination = $pagenator->paginate($query, $request->query->get('page', 1), 20);
      
        return array(
            'pagination' => $pagination,
        );
    }
    
    /**
     * @Route("/{id}", name="scomdis_admin_sentinel_site_show", requirements={"id" = "\d+"})
     * @Template()
     */
    public function showAction(Request $request, $id)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $repo = $manager->getRepository('DHISSComDisBundle:SentinelSite');
        $sentinelSite = $repo->find($id);
        if (!$sentinelSite) {
            throw $this->createNotFoundException();
        }
        
        $referer = $request->server->get('HTTP_REFERER');
        $request->getSession()->set('scomdis_admin_sentinel_site/before_edit_url', $referer);
        
        return array(
            'sentinelSite' => $sentinelSite,
        );
    }
    
    /**
     * @Route("/register", name="scomdis_admin_sentinel_site_register")
     * @Template()
     */
    public function registerAction(Request $request)
    {
        $sentinelSite = new SentinelSite();
        $form = $this->createForm(new SentinelSiteRegistrationType(), $sentinelSite);
        
        if ('POST' === $request->getMethod()) {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            if ($form->isValid()) {
                
                $manager = $this->get('doctrine')->getEntityManager('scomdis');
                $repo = $manager->getRepository('DHISSComDisBundle:SentinelSite');
                if (!$repo->isExist($sentinelSite)) {
                    $request->getSession()->set('scomdis_admin_sentinel_site/registration', $data);
                    return $this->redirect($this->generateUrl('scomdis_admin_sentinel_site_confirm'));
                } else {
                    $request->getSession()->setFlash('error', "Sentinel Site ID is duplicated.");
                }
            }
        }
        
        return array(
            'form' => $form->createView(),
        );
    }

    /**
     * @Route("/confirm", name="scomdis_admin_sentinel_site_confirm")
     * @Template()
     */
    public function confirmAction(Request $request)
    {
        $sentinelSite = new SentinelSite();
        if (!$this->restoreSentinelSiteForms($sentinelSite, array('sentinel_site_registration'))) {
            return $this->redirect($this->generateUrl('scomdis_admin_sentinel_site_registration'));
        }

        if ('POST' === $request->getMethod()) {
            
            try {

                $manager = $this->get('doctrine')->getEntityManager('scomdis');
                $repo = $manager->getRepository('DHISSComDisBundle:SentinelSite');
                $repo->saveSentinelSite($sentinelSite);

                $session = $request->getSession();
                $session->remove('scomdis_admin_sentinel_site/registration');
                $message = "Add sentinel site. ID: " . $sentinelSite->getId();
                $session->setFlash('success', $message);
                
                return $this->redirect($this->generateUrl('scomdis_admin_sentinel_site'));
                
            } catch (\InvalidArgumentException $e) {
                $request->getSession()->setFlash('error', $e->getMessage());
                return $this->redirect($this->generateUrl('scomdis_admin_sentinel_site_register'));
            }
        }
        
        return array(
            'sentinelSite' => $sentinelSite,
        );
    }
    
    /**
     * @Route("/edit/{id}", name="scomdis_admin_sentinel_site_edit", requirements={"id" = "\d+"})
     * @Template
     */
    public function editAction(Request $request, $id)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $repo = $manager->getRepository('DHISSComDisBundle:SentinelSite');
        $sentinelSite = $repo->find($id);
        if (!$sentinelSite) {
            throw $this->createNotFoundException();
        }
        
        $form = $this->createForm(new SentinelSiteEditType(), $sentinelSite);
        if ('POST' === $request->getMethod()) {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            if ($form->isValid()) {                
                try {
                    
                    $manager = $this->get('doctrine')->getEntityManager('scomdis');
                    $repo = $manager->getRepository('DHISSComDisBundle:SentinelSite');
                    $repo->updateSentinelSite($sentinelSite);

                    $session = $request->getSession();
                    $session->remove('scomdis_admin_sentinel_site/registration');
                    $message = "Update sentinel site: " . $sentinelSite->getId();
                    $session->setFlash('success', $message);                    

                    return $this->redirect($this->generateUrl('scomdis_admin_sentinel_site_update', array('id' => $sentinelSite->getId())));

                } catch (\InvalidArgumentException $e) {
                    $request->getSession()->setFlash('error', $e->getMessage());
                }
            }
        }

        return array(
            'sentinelSite' => $sentinelSite,
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("/update/{id}", name="scomdis_admin_sentinel_site_update", requirements={"id" = "\d+"})
     * @Template()
     */
    public function updateAction(Request $request, $id)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $repo = $manager->getRepository('DHISSComDisBundle:SentinelSite');
        $sentinelSite = $repo->find($id);
        if (!$sentinelSite) {
            throw $this->createNotFoundException();
        }
        
        $pre_url = null;
        $session = $request->getSession();
        if ($session->has('scomdis_admin_sentinel_site/before_edit_url')) {
            $pre_url = $session->get('scomdis_admin_sentinel_site/before_edit_url');
            $session->remove('scomdis_admin_sentinel_site/before_edit_url');
        }
        $message = 'Update complete.';
        $session->setFlash('success', $message);
        
        return array(
            'sentinelSite' => $sentinelSite,
            'pre_url' => $pre_url,
        );
    }

    /**
     * @Route ("/delete/{id}", name="scomdis_admin_sentinel_site_delete", requirements={"id" = "\d+"})
     * @Template
     */
    public function deleteAction(Request $request, $id)
    {
        try {
            $manager = $this->get('doctrine')->getEntityManager('scomdis');
            $repo = $manager->getRepository('DHISSComDisBundle:SentinelSite');
            $repo->deleteSentinelSite($id);
            
            $message = "Complete deleting sentinel site. id: $id.";
            $request->getSession()->setFlash('success', $message);
            
        } catch (\InvalidArgumentException $e) {
            $request->getSession()->setFlash('error', $e->getMessage());
        }
        
        return $this->redirect($this->generateUrl('scomdis_admin_sentinel_site'));
    }
    
    /**
     * Restore SentinelSite data
     * @param SentinelSite $sentinelSite
     * @param array $formKeys
     * @return boolean
     * @throws \InvalidArgumentException 
     */
    private function restoreSentinelSiteForms(SentinelSite $sentinelSite, array $formKeys) {
        
        $session = $this->getRequest()->getSession();
        
        $factory = $this->get('form.factory');
        $binder = function($type, $data) use($factory, $sentinelSite) {
            if (isset($data['_token'])) {
                unset($data['_token']);
            }
            $form = $factory->create($type, $sentinelSite, array('csrf_protection' => false));
            $form->bind($data);
            
            return $form->isValid();
        };
        
        $valid = true;
        foreach ($formKeys as $formKey) {
            switch ($formKey) {
                case 'sentinel_site_registration':
                    $valid = $binder(new SentinelSiteRegistrationType(),
                                     $session->get('scomdis_admin_sentinel_site/registration'));
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
}
