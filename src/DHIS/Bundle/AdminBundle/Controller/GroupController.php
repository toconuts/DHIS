<?php

namespace DHIS\Bundle\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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
                query->get('p', 1), 5);
        
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
        return array(
            'group' => $group,
        );
    }
}
