<?php

namespace DHIS\Bundle\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use DHIS\Bundle\CommonBundle\Entity\Group;
use DHIS\Bundle\CommonBundle\Entity\GroupRepository;
use DHIS\Bundle\AdminBundle\Form\GroupRegistrationType;
use DHIS\Bundle\AdminBundle\Form\GroupEditType;

/**
 * GroupController for Admin site.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @Route("/admin/group")
 */
class GroupController extends AppController
{
    /**
     * @Route("/", name="admin_group")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $userRepository = $this->get('doctrine')->
                getRepository('DHISCommonBundle:Group');
        $query = $userRepository->createQueryBuilder('r')->
                orderBy('r.id', 'ASC')->getQuery();
        
        $pagenator = $this->get('knp_paginator');
        $pagination = $pagenator->paginate($query, $request->
                query->get('p', 1), 20);
        
        return array(
            'pagination' => $pagination,
        );
    }
    
    /**
     * @Route("/{id}", name="admin_group_show", requirements={"id" = "\d+"})
     * @Template()
     */
    public function showAction(Request $request, $id)
    {
        $groupRepository = $this->get('doctrine')->
                getRepository('DHISCommonBundle:Group');
        $group = $groupRepository->find($id);
        if (!$group) {
            throw $this->createNotFoundException();
        }
        
        $referer = $request->server->get('HTTP_REFERER');
        $request->getSession()->set('admin_group/before_edit_url', $referer);
        
        return array(
            'group' => $group,
        );
    }
    
    /**
     * @Route("/register", name="admin_group_register")
     * @Template()
     */
    public function registerAction(Request $request)
    {
        $group = new Group();
        $form = $this->createForm(new GroupRegistrationType(), $group);
        
        if ('POST' === $request->getMethod()) {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            if ($form->isValid()) {
                $request->getSession()->set('admin_group/registration', $data);
                return $this->redirect($this->generateUrl('admin_group_confirm'));
            }
        }
        
        return array(
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("/confirm", name="admin_group_confirm")
     * @Template()
     */
    public function confirmAction(Request $request)
    {
        $group = new Group();
        
        if (!$this->restoreGroupForms($group, array('group_registration'))) {
            return $this->redirect($this->generateUrl('admin_group_registration'));
        }

        if ('POST' === $request->getMethod()) {

            try {

                $em = $this->getDoctrine()->getEntityManager('common');
                $repository = $em->getRepository('DHISCommonBundle:Group');
                $repository->saveGroup($group);

                $session = $request->getSession();
                $session->remove('admin_group/registration');

                return $this->redirect($this->generateUrl('admin_group_finish'));
            
            } catch (\InvalidArgumentException $e) {
                    $request->getSession()->setFlash('error', $e->getMessage());
            }
        }
        
        return array(
            'group' => $group,
        );
    }
    
    /**
     * @Route ("/finish", name="admin_group_finish")
     * @Template
     */
    public function finishAction()
    {
        return array();
    }
    
    /**
     * @Route("/edit/{id}", name="admin_group_edit", requirements={"id" = "\d+"})
     * @Template
     */
    public function editAction(Request $request, $id)
    {
        $groupRepository = $this->get('doctrine')->
                getRepository('DHISCommonBundle:Group');
        $group = $groupRepository->find($id);
        if (!$group) {
            throw $this->createNotFoundException();
        }
        
        $form = $this->createForm(new GroupEditType(), $group);
        
        if ('POST' === $request->getMethod()) {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            if ($form->isValid()) {
                
                try {
                    $em = $this->getDoctrine()->getEntityManager('common');
                    $repository = $em->getRepository('DHISCommonBundle:Group');
                    $repository->saveGroup($group);

                    return $this->redirect($this->generateUrl('admin_group_update', array('id' => $id)));
                
                } catch (\InvalidArgumentException $e) {
                    $request->getSession()->setFlash('error', $e->getMessage());
                }
            }
        }
        
        return array(
            'group' => $group,
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("update/{id}", name="admin_group_update", requirements={"id" = "\d+"})
     * @Template()
     */
    public function updateAction(Request $request, $id)
    {
        $groupRepository = $this->get('doctrine')->
                getRepository('DHISCommonBundle:Group');
        $group = $groupRepository->find($id);
        if (!$group) {
            throw $this->createNotFoundException();
        }
        
        $session = $request->getSession();
        if ($session->has('admin_group/before_edit_url')) {
            $pre_url = $session->get('admin_group/before_edit_url');
            $session->remove('admin_group/before_edit_url');
        }
        $message = 'Update complete.';
        $session->setFlash('success', $message);
        
        return array(
            'group' => $group,
            'pre_url' => $pre_url,
        );
    }
    
    /**
     * Restore Group data
     * @param Group $group
     * @param array $formKeys
     * @return boolean
     * @throws \InvalidArgumentException 
     */
    private function restoreGroupForms(Group $group, array $formKeys) {
        
        $session = $this->getRequest()->getSession();
        
        $factory = $this->get('form.factory');
        $binder = function($type, $data) use($factory, $group) {
            if (isset($data['_token'])) {
                unset($data['_token']);
            }
            $form = $factory->create($type, $group, array('csrf_protection' => false));
            $form->bind($data);
            
            return $form->isValid();
        };
        
        $valid = true;
        foreach ($formKeys as $formKey) {
            switch ($formKey) {
                case 'group_registration':
                    $valid = $binder(new GroupRegistrationType(),
                                     $session->get('admin_group/registration'));
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
