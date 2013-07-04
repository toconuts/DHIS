<?php

namespace DHIS\Bundle\CommonBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use DHIS\Bundle\CommonBundle\Entity\User;
use DHIS\Bundle\CommonBundle\Entity\UserRepository;
use DHIS\Bundle\CommonBundle\Form\UserProfileType;

/**
 * ProfileController for Common site.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @Route("/common/profile")
 */
class ProfileController extends AppController
{
    /**
     * @Route("/", name="common_profile_show")
     * @Template()
     */
    public function showAction()
    {
        $securityContext = $this->get('security.context');
        $user = $securityContext->getToken()->getUser();
        if (!$user) {
            throw $this->createNotFoundException();
        }
        
        return array(
            'user' => $user,
        );
    }

    /**
     * @Route("/edit", name="common_profile_edit")
     * @Template()
     */
    public function editAction(Request $request)
    {
        $securityContext = $this->get('security.context');
        $user = $securityContext->getToken()->getUser();
        if (!$user) {
            throw $this->createNotFoundException();
        }
        
        $form = $this->createForm(new UserProfileType(), $user);
        
        if ('POST' === $request->getMethod()) {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            if ($form->isValid()) {
                
                if (true == array_key_exists('changePassword', $data) && 
                        true == $data['changePassword']){

                    if (!$user->isValidPassword($data['rawPassword'])) {
                        $message = 'Invalid password.';
                        $request->getSession()->setFlash('error', $message);
                        return $this->redirect($this->generateUrl('common_profile_edit'));
                    }
                }
                
                $request->getSession()->set('common_profile/user', $data);
                return $this->redirect($this->generateUrl('common_profile_confirm'));
            }
        }
        
        return array(
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("/confirm", name="common_profile_confirm")
     * @Template()
     */
    public function confirmAction(Request $request)
    {
        $securityContext = $this->get('security.context');
        $user = $securityContext->getToken()->getUser();

        $session = $request->getSession();
        
        if (!$this->restoreUserForms($user, array('common_profile_user'))) {
            $message = "Can not bind data from form.";
            $session->setFlash('error', $message);
            return $this->redirect($this->generateUrl('common_profile_show'));
        }
        $data = $session->get('common_profile/user');
        $changePassword = array_key_exists('changePassword', $data) ? true : false;
        
        if ('POST' === $request->getMethod()) {
            try {

                if ($changePassword){
                    $user->setRawPassword($data['newRawPassword']['first']);
                }
                
                $em = $this->getDoctrine()->getEntityManager('common');
                $repository = $em->getRepository('DHISCommonBundle:User');
                $repository->saveUser($user);

                $session->remove('common_profile/user');
                $message = "Complete updating your profile.";
                $request->getSession()->setFlash('success', $message);

                return $this->redirect($this->generateUrl('common_profile_show'));

            } catch (\InvalidArgumentException $e) {
                $request->getSession()->setFlash('error', $e->getMessage());
            }
            
        }

        return array(
            'user' => $user,
            'changePassword' => $changePassword,
        );
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
                case 'common_profile_user':
                    $valid = $binder(new UserProfileType(),
                                     $session->get('common_profile/user'));
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
