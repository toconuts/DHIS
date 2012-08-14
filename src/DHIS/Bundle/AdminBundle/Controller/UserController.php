<?php

namespace DHIS\Bundle\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use DHIS\Bundle\CommonBundle\Entity\User;
use DHIS\Bundle\AdminBundle\Form\UserRegistrationType;
use DHIS\Bundle\AdminBundle\Form\UserGroupType;
use DHIS\Bundle\AdminBundle\Form\UserEditType;

/**
 * UserController for Admin site.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @Route("/admin/user")
 */
class UserController extends AppController
{
    /**
     * @Route("/", name="admin_user")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $userRepository = $this->get('doctrine')->
                getRepository('DHISCommonBundle:User');
        $query = $userRepository->createQueryBuilder('r')->
                orderBy('r.id', 'DESC')->getQuery();
        
        $pagenator = $this->get('knp_paginator');
        $pagination = $pagenator->paginate($query, $request->
                query->get('p', 1), 10);
      
        return array(
            'pagination' => $pagination,
        );
    }
    
    /**
     * @Route("/{id}", name="admin_user_show", requirements={"id" = "\d+"})
     * @Template()
     */
    public function showAction(Request $request, $id)
    {
        $userRepository = $this->get('doctrine')->
                getRepository('DHISCommonBundle:User');
        $user = $userRepository->find($id);
        if (!$user) {
            throw $this->createNotFoundException();
        }
        
        $referer = $request->server->get('HTTP_REFERER');
        $request->getSession()->set('admin_user/before_edit_url', $referer);
        
        return array(
            'user' => $user,
        );
    }
    
    /**
     * @Route("/register", name="admin_user_register")
     * @Template()
     */
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(new UserRegistrationType(), $user);
        
        if ('POST' === $request->getMethod()) {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            if ($form->isValid()) {
                $request->getSession()->set('admin_user/registration', $data);
                return $this->redirect($this->generateUrl('admin_user_group'));
            }
        } else if ($request->getSession ()->has('admin_user/registration')) {
            $data = $request->getSession()->get('admin_user/registration');
            $data['_token'] = $form['_token']->getData();
            $form->bind($data);
        }
        
        return array(
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("/group", name="admin_user_group")
     * @Template()
     */
    public function groupAction(Request $request)
    {
        $user = new User();
        if (!$this->restoreUserForms($user, array('user_registration'))) {
            return $this->redirect($this->generateUrl('admin_user_register'));
        }
        
        $groupRepository = $this->get('doctrine')->getRepository('DHISCommonBundle:Group');
        $groups = $groupRepository->findAll();
        
        $form = $this->createForm(new UserGroupType(), $user);
        
        if ('POST' === $request->getMethod()) {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            if ($form->isValid()) {
                $request->getSession()->set('admin_user/group', $data);
                return $this->redirect($this->generateUrl('admin_user_confirm'));
            }
        } else if ($request->getSession()->has('admin_user/group')) {
            $data = $request->getSession()->get('admin_user/group');
            $data['_token'] = $form['_token']->getData();
            $form->bind($data);
        }
        
        return array(
            'groups'  => $groups,
            'form'  => $form->createView(),
        );
    }
    
    /**
     * @Route("/confirm", name="admin_user_confirm")
     * @Template()
     */
    public function confirmAction(Request $request)
    {
        $user = new User();
        
        if (!$this->restoreUserForms($user, array('user_registration', 'user_group'))) {
            return $this->redirect($this->generateUrl('admin_user_registration'));
        }

        if ('POST' === $request->getMethod()) {
            
            // @todo duplication check.
            $em = $this->getDoctrine()->getEntityManager('common');
            $em->persist($user);
            $em->flush();
            
            $session = $request->getSession();
            $session->remove('admin_user/registration');
            $session->remove('admin_user/group');
            
            return $this->redirect($this->generateUrl('admin_user_finish'));
        }
        
        return array(
            'user' => $user,
        );
    }
    
    /**
     * @Route("/edit/{id}", name="admin_user_edit", requirements={"id" = "\d+"})
     * @Template
     */
    public function editAction(Request $request, $id)
    {
        $userRepository = $this->get('doctrine')->
                getRepository('DHISCommonBundle:User');
        $user = $userRepository->find($id);
        if (!$user) {
            throw $this->createNotFoundException();
        }
        
        $form = $this->createForm(new UserEditType(), $user);
        if ('POST' === $request->getMethod()) {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            if ($form->isValid()) {
                
                // @todo duplication check.
                $em = $this->getDoctrine()->getEntityManager('common');
                $em->persist($user);
                $em->flush();
            
                return $this->redirect($this->generateUrl('admin_user_update', array('id' => $id)));
            }
        }

        return array(
            'user' => $user,
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("update/{id}", name="admin_user_update", requirements={"id" = "\d+"})
     * @Template()
     */
    public function updateAction(Request $request, $id)
    {
        $userRepository = $this->get('doctrine')->
                getRepository('DHISCommonBundle:User');
        $user = $userRepository->find($id);
        if (!$user) {
            throw $this->createNotFoundException();
        }
        
        $session = $request->getSession();
        if ($session->has('admin_user/before_edit_url')) {
            $pre_url = $session->get('admin_user/before_edit_url');
            $session->remove('admin_user/before_edit_url');
        }
        $message = 'Update complete.';
        $session->setFlash('success', $message);
        
        return array(
            'user' => $user,
            'pre_url' => $pre_url,
        );
    }

    /**
     * @Route ("/finish", name="admin_user_finish")
     * @Template
     */
    public function finishAction()
    {
        return array();
    }
    
    /**
     * Restore User data
     * @param User $user
     * @param array $formKeys
     * @return boolean
     * @throws \InvalidArgumentException 
     */
    private function restoreUserForms(User $user, array $formKeys) {
        
        $session = $this->getRequest()->getSession();
        
        $factory = $this->get('form.factory');
        $binder = function($type, $data) use($factory, $user) {
            if (isset($data['_token'])) {
                unset($data['_token']);
            }
            $form = $factory->create($type, $user, array('csrf_protection' => false));
            $form->bind($data);
            
            return $form->isValid();
        };
        
        $valid = true;
        foreach ($formKeys as $formKey) {
            switch ($formKey) {
                case 'user_registration':
                    $valid = $binder(new UserRegistrationType(),
                                     $session->get('admin_user/registration'));
                    break;
                case 'user_group':
                    $valid = $binder(new UserGroupType(),
                                     $session->get('admin_user/group'));
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
