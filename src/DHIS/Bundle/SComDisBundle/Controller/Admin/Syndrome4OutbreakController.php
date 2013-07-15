<?php

namespace DHIS\Bundle\SComDisBundle\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use DHIS\Bundle\SComDisBundle\Entity\Syndrome4Outbreak;
use DHIS\Bundle\SComDisBundle\Form\Admin\Syndrome4Outbreak\Syndrome4OutbreakRegistrationType;
use DHIS\Bundle\SComDisBundle\Form\Admin\Syndrome4Outbreak\Syndrome4OutbreakEditType;

/**
 * Syndrome4OutbreakController for SComDis Admin site.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @Route("/admin/syndrome4outbreak")
 */
class Syndrome4OutbreakController extends AdminAppController
{
    /**
     * @Route("/", name="scomdis_admin_syndrome4outbreak")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $repo = $manager->getRepository('DHISSComDisBundle:Syndrome4Outbreak');
        $query = $repo->createQueryBuilder('r')->orderBy('r.id', 'ASC')->getQuery();
        
        $pagenator = $this->get('knp_paginator');
        $pagination = $pagenator->paginate($query, $request->query->get('page', 1), 20);
      
        return array(
            'pagination' => $pagination,
        );
    }
    
    /**
     * @Route("/{id}", name="scomdis_admin_syndrome4outbreak_show", requirements={"id" = "\d+"})
     * @Template()
     */
    public function showAction(Request $request, $id)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $repo = $manager->getRepository('DHISSComDisBundle:Syndrome4Outbreak');
        $syndrome = $repo->find($id);
        if (!$syndrome) {
            throw $this->createNotFoundException();
        }
        
        $referer = $request->server->get('HTTP_REFERER');
        $request->getSession()->set('scomdis_admin_syndrome4outbreak/before_edit_url', $referer);
        
        return array(
            'syndrome' => $syndrome,
        );
    }
    
    /**
     * @Route("/register", name="scomdis_admin_syndrome4outbreak_register")
     * @Template()
     */
    public function registerAction(Request $request)
    {
        $syndrome = new Syndrome4Outbreak();
        $form = $this->createForm(new Syndrome4OutbreakRegistrationType(), $syndrome);
        
        if ('POST' === $request->getMethod()) {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            if ($form->isValid()) {
                
                $manager = $this->get('doctrine')->getEntityManager('scomdis');
                $repo = $manager->getRepository('DHISSComDisBundle:Syndrome4Outbreak');
                if ($repo->isExist($syndrome)) {
                    $request->getSession()->setFlash('error', "Syndrome ID is duplicated.");
                } else if (!$repo->isAvailableDispID($syndrome)) {
                    $request->getSession()->setFlash('error', "Display ID is already used.");
                } else {
                    $request->getSession()->set('scomdis_admin_syndrome4outbreak/registration', $data);
                    return $this->redirect($this->generateUrl('scomdis_admin_syndrome4outbreak_confirm'));
                }
            }
        }
        
        return array(
            'form' => $form->createView(),
        );
    }

    /**
     * @Route("/confirm", name="scomdis_admin_syndrome4outbreak_confirm")
     * @Template()
     */
    public function confirmAction(Request $request)
    {
        $syndrome = new Syndrome4Outbreak();
        if (!$this->restoreSyndromeForms($syndrome, array('syndrome4outbreak_registration'))) {
            return $this->redirect($this->generateUrl('scomdis_admin_syndrome4outbreak_registration'));
        }

        if ('POST' === $request->getMethod()) {
            
            try {

                $manager = $this->get('doctrine')->getEntityManager('scomdis');
                $repo = $manager->getRepository('DHISSComDisBundle:Syndrome4Outbreak');
                $repo->saveSyndrome($syndrome);

                $session = $request->getSession();
                $session->remove('scomdis_admin_syndrome4outbreak/registration');
                $message = "Add Syndrome. ID: " . $syndrome->getId();
                $session->setFlash('success', $message);
                
                return $this->redirect($this->generateUrl('scomdis_admin_syndrome4outbreak'));
                
            } catch (\InvalidArgumentException $e) {
                $request->getSession()->setFlash('error', $e->getMessage());
                return $this->redirect($this->generateUrl('scomdis_admin_syndrome4outbreak_register'));
            }
        }
        
        return array(
            'syndrome' => $syndrome,
        );
    }
    
    /**
     * @Route("/edit/{id}", name="scomdis_admin_syndrome4outbreak_edit", requirements={"id" = "\d+"})
     * @Template
     */
    public function editAction(Request $request, $id)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $repo = $manager->getRepository('DHISSComDisBundle:Syndrome4Outbreak');
        $syndrome = $repo->find($id);
        if (!$syndrome) {
            throw $this->createNotFoundException();
        }
        
        $form = $this->createForm(new Syndrome4OutbreakEditType(), $syndrome);
        if ('POST' === $request->getMethod()) {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            if ($form->isValid()) {              
                try {

                    $manager = $this->get('doctrine')->getEntityManager('scomdis');
                    $repo = $manager->getRepository('DHISSComDisBundle:Syndrome4Outbreak');

                    if ($repo->isAvailableDispID($syndrome)) {
                        $repo->updateSyndrome($syndrome);

                        $session = $request->getSession();
                        $session->remove('scomdis_admin_syndrome4outbreak/registration');
                        $message = "Update syndrome: " . $syndrome->getId();
                        $session->setFlash('success', $message);                    

                        return $this->redirect($this->generateUrl('scomdis_admin_syndrome4outbreak_update', array('id' => $syndrome->getId())));
                    } else {
                        $request->getSession()->setFlash('error', "Display ID is already used.");
                    }
                } catch (\InvalidArgumentException $e) {
                    $request->getSession()->setFlash('error', $e->getMessage());
                }
            }
        }

        return array(
            'syndrome' => $syndrome,
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("/update/{id}", name="scomdis_admin_syndrome4outbreak_update", requirements={"id" = "\d+"})
     * @Template()
     */
    public function updateAction(Request $request, $id)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $repo = $manager->getRepository('DHISSComDisBundle:Syndrome4Outbreak');
        $syndrome = $repo->find($id);
        if (!$syndrome) {
            throw $this->createNotFoundException();
        }
        
        $pre_url = null;
        $session = $request->getSession();
        if ($session->has('scomdis_admin_syndrome4outbreak/before_edit_url')) {
            $pre_url = $session->get('scomdis_admin_syndrome4outbreak/before_edit_url');
            $session->remove('scomdis_admin_syndrome/before_edit_url');
        }
        $message = 'Update complete.';
        $session->setFlash('success', $message);
        
        return array(
            'syndrome' => $syndrome,
            'pre_url' => $pre_url,
        );
    }

    /**
     * @Route ("/delete/{id}", name="scomdis_admin_syndrome4outbreak_delete", requirements={"id" = "\d+"})
     * @Template
     */
    public function deleteAction(Request $request, $id)
    {
        try {
            $manager = $this->get('doctrine')->getEntityManager('scomdis');
            $repo = $manager->getRepository('DHISSComDisBundle:Syndrome4Outbreak');
            $repo->deleteSyndrome($id);
            
            $message = "Complete deleting syndrome. id: $id.";
            $request->getSession()->setFlash('success', $message);
            
        } catch (\InvalidArgumentException $e) {
            $request->getSession()->setFlash('error', $e->getMessage());
        }
        
        return $this->redirect($this->generateUrl('scomdis_admin_syndrome4outbreak'));
    }
    
    /**
     * Restore Syndrome4Outbreak data
     * @param Syndrome4Outbreak $syndrome
     * @param array $formKeys
     * @return boolean
     * @throws \InvalidArgumentException 
     */
    private function restoreSyndromeForms(Syndrome4Outbreak $syndrome, array $formKeys) {
        
        $session = $this->getRequest()->getSession();
        
        $factory = $this->get('form.factory');
        $binder = function($type, $data) use($factory, $syndrome) {
            if (isset($data['_token'])) {
                unset($data['_token']);
            }
            $form = $factory->create($type, $syndrome, array('csrf_protection' => false));
            $form->bind($data);
            
            return $form->isValid();
        };
        
        $valid = true;
        foreach ($formKeys as $formKey) {
            switch ($formKey) {
                case 'syndrome4outbreak_registration':
                    $valid = $binder(new Syndrome4OutbreakRegistrationType(),
                                     $session->get('scomdis_admin_syndrome4outbreak/registration'));
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
