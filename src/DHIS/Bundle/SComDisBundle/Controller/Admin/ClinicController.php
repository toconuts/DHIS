<?php

namespace DHIS\Bundle\SComDisBundle\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use DHIS\Bundle\SComDisBundle\Entity\Clinic;
use DHIS\Bundle\SComDisBundle\Form\Admin\Clinic\ClinicRegistrationType;
use DHIS\Bundle\SComDisBundle\Form\Admin\Clinic\ClinicEditType;

/**
 * ClinicController for SComDis Admin site.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @Route("/admin/clinic")
 */
class ClinicController extends AdminAppController
{
    /**
     * @Route("/", name="scomdis_admin_clinic")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $repo = $manager->getRepository('DHISSComDisBundle:Clinic');
        $query = $repo->createQueryBuilder('r')->orderBy('r.id', 'ASC')->getQuery();
        
        $pagenator = $this->get('knp_paginator');
        $pagination = $pagenator->paginate($query, $request->query->get('p', 1), 100);
      
        return array(
            'pagination' => $pagination,
        );
    }
    
    /**
     * @Route("/{id}", name="scomdis_admin_clinic_show", requirements={"id" = "\d+"})
     * @Template()
     */
    public function showAction(Request $request, $id)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $repo = $manager->getRepository('DHISSComDisBundle:Clinic');
        $clinic = $repo->find($id);
        if (!$clinic) {
            throw $this->createNotFoundException();
        }
        
        $referer = $request->server->get('HTTP_REFERER');
        $request->getSession()->set('scomdis_admin_clinic/before_edit_url', $referer);
        
        return array(
            'clinic' => $clinic,
        );
    }
    
    /**
     * @Route("/register", name="scomdis_admin_clinic_register")
     * @Template()
     */
    public function registerAction(Request $request)
    {
        $clinic = new Clinic();
        $form = $this->createForm(new ClinicRegistrationType(), $clinic);
        
        if ('POST' === $request->getMethod()) {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            if ($form->isValid()) {
                
                $manager = $this->get('doctrine')->getEntityManager('scomdis');
                $repo = $manager->getRepository('DHISSComDisBundle:Clinic');
                if (!$repo->isExist($clinic)) {
                    $request->getSession()->set('scomdis_admin_clinic/registration', $data);
                    return $this->redirect($this->generateUrl('scomdis_admin_clinic_confirm'));
                } else {
                    $request->getSession()->setFlash('error', "Clinic ID is duplicated.");
                }
            }
        }
        
        return array(
            'form' => $form->createView(),
        );
    }

    /**
     * @Route("/confirm", name="scomdis_admin_clinic_confirm")
     * @Template()
     */
    public function confirmAction(Request $request)
    {
        $clinic = new Clinic();
        if (!$this->restoreClinicForms($clinic, array('clinic_registration'))) {
            return $this->redirect($this->generateUrl('scomdis_admin_clinic_registration'));
        }

        if ('POST' === $request->getMethod()) {
            
            try {

                $manager = $this->get('doctrine')->getEntityManager('scomdis');
                $repo = $manager->getRepository('DHISSComDisBundle:Clinic');
                $repo->saveClinic($clinic);

                $session = $request->getSession();
                $session->remove('scomdis_admin_clinic/registration');
                $message = "Add clinic. ID: " . $clinic->getId();
                $session->setFlash('success', $message);
                
                return $this->redirect($this->generateUrl('scomdis_admin_clinic'));
                
            } catch (\InvalidArgumentException $e) {
                $request->getSession()->setFlash('error', $e->getMessage());
                return $this->redirect($this->generateUrl('scomdis_admin_clinic_register'));
            }
        }
        
        return array(
            'clinic' => $clinic,
        );
    }
    
    /**
     * @Route("/edit/{id}", name="scomdis_admin_clinic_edit", requirements={"id" = "\d+"})
     * @Template
     */
    public function editAction(Request $request, $id)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $repo = $manager->getRepository('DHISSComDisBundle:Clinic');
        $clinic = $repo->find($id);
        if (!$clinic) {
            throw $this->createNotFoundException();
        }
        
        $form = $this->createForm(new ClinicEditType(), $clinic);
        if ('POST' === $request->getMethod()) {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            if ($form->isValid()) {                
                try {
                    
                    $manager = $this->get('doctrine')->getEntityManager('scomdis');
                    $repo = $manager->getRepository('DHISSComDisBundle:Clinic');
                    $repo->updateClinic($clinic);

                    $session = $request->getSession();
                    $session->remove('scomdis_admin_clinic/registration');
                    $message = "Update clinic: " . $clinic->getId();
                    $session->setFlash('success', $message);                    

                    return $this->redirect($this->generateUrl('scomdis_admin_clinic_update', array('id' => $clinic->getId())));

                } catch (\InvalidArgumentException $e) {
                    $request->getSession()->setFlash('error', $e->getMessage());
                }
            }
        }

        return array(
            'clinic' => $clinic,
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("/update/{id}", name="scomdis_admin_clinic_update", requirements={"id" = "\d+"})
     * @Template()
     */
    public function updateAction(Request $request, $id)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $repo = $manager->getRepository('DHISSComDisBundle:Clinic');
        $clinic = $repo->find($id);
        if (!$clinic) {
            throw $this->createNotFoundException();
        }
        
        $pre_url = null;
        $session = $request->getSession();
        if ($session->has('scomdis_admin_clinic/before_edit_url')) {
            $pre_url = $session->get('scomdis_admin_clinic/before_edit_url');
            $session->remove('scomdis_admin_clinic/before_edit_url');
        }
        $message = 'Update complete.';
        $session->setFlash('success', $message);
        
        return array(
            'clinic' => $clinic,
            'pre_url' => $pre_url,
        );
    }

    /**
     * @Route ("/delete/{id}", name="scomdis_admin_clinic_delete", requirements={"id" = "\d+"})
     * @Template
     */
    public function deleteAction(Request $request, $id)
    {
        try {
            $manager = $this->get('doctrine')->getEntityManager('scomdis');
            $repo = $manager->getRepository('DHISSComDisBundle:Clinic');
            $repo->deleteClinic($id);
            
            $message = "Complete deleting clinic. id: $id.";
            $request->getSession()->setFlash('success', $message);
            
        } catch (\InvalidArgumentException $e) {
            $request->getSession()->setFlash('error', $e->getMessage());
        }
        
        return $this->redirect($this->generateUrl('scomdis_admin_clinic'));
    }
    
    /**
     * Restore User data
     * @param User $user
     * @param array $formKeys
     * @return boolean
     * @throws \InvalidArgumentException 
     */
    private function restoreClinicForms(Clinic $clinic, array $formKeys) {
        
        $session = $this->getRequest()->getSession();
        
        $factory = $this->get('form.factory');
        $binder = function($type, $data) use($factory, $clinic) {
            if (isset($data['_token'])) {
                unset($data['_token']);
            }
            $form = $factory->create($type, $clinic, array('csrf_protection' => false));
            $form->bind($data);
            
            return $form->isValid();
        };
        
        $valid = true;
        foreach ($formKeys as $formKey) {
            switch ($formKey) {
                case 'clinic_registration':
                    $valid = $binder(new ClinicRegistrationType(),
                                     $session->get('scomdis_admin_clinic/registration'));
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
