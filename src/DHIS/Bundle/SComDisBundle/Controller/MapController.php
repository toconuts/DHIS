<?php

namespace DHIS\Bundle\SComDisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use DHIS\Bundle\SComDisBundle\Entity\SurveillanceCoefficientCriteria;

use DHIS\Bundle\SComDisBundle\Form\SurveillanceCoefficientCriteriaType;

/**
 * @Route("/socomdis/map") 
 * 
 */
class MapController extends AppController
{
    /**
     * @Route("/epidemic_phase", name="scomdis_map_epidemic_phase")
     * @Template()
     */
    public function epidemicPhaseAction(Request $request)
    {
        $manager = $this->get('doctrine')->getEntityManager('scomdis');
        $syndromeRepositry = $manager->getRepository('DHISSComDisBundle:Syndrome4Surveillance');
        $syndromes = $syndromeRepositry->findAll();
        
        $criteria = new SurveillanceCoefficientCriteria($syndromes);
        
        $form = $this->createForm(new SurveillanceCoefficientCriteriaType(), $criteria);
        
        if ($request->getMethod() === 'POST') {
            $data = $request->request->get($form->getName());
            $form->bind($data);
            if ($form->isValid()) {
                //$request->getSession()->set('scomdis_surveillance/new', $data);
                //return $this->redirect($this->generateUrl('scomdis_map_confirm_grade'));
                
                return $this->forward('DHISSComDisBundle:Map:confirmPhase', array(
                    'request' => null,
                    'criteria' => $data,
                ));
            }
        }
        
        return array(
            'yearChoices' => $criteria->getYearChoices(),
            'syndromes' => $syndromes,
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("/confirm_phase", name="scomdis_map_confirm_phase")
     * @Template()
     */
    public function confirmPhaseAction(Request $request = null, $criteria = null)
    {
        if ($request && $request->getMethod() === 'POST') {
            return $this->render('DHISSComDisBundle:Map:map.html.twig', array(
            //    'lineChart' => $lineChart,
            //    'year_choices' => $criteria->getYearChoices(),
            //    'syndrome_choices' => $criteria->getSyndromes(),
            //    'sentinelSite_choices' => $criteria->getSentinelSites(),
            //    'syndromes' => $syndromes,
            //    'sentinelSites' => $sentinelSites,
            ));
        }
        return array();
    }
}
