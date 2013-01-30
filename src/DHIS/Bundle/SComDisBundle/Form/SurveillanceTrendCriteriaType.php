<?php

namespace DHIS\Bundle\SComDisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * SurveillanceTrendCriteriaType
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class SurveillanceTrendCriteriaType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
              ->add('test', 'text')
              ->add('year_choices', 'choice', array(
                  'choices' => array('year1' => '2013', 
                                     'year2' => '2012',
                                     'year3' => '2011',
                                     'year4' => '2010',
                                     'year5' => '2009',
                                     'year6' => '2008'),
                  'multiple' => true,
                  //'expanded' => true,
              ))
              ->add('syndromes')
              //->add('syndromes', 'choice', array(
              //    'multiple' => true,
              //))
              /*->add('syndromes', 'entity', array(
                  'type' => 'checkbox',
                  'options' => array(
                      'required' => false,
                  )
              ))*/
/*
              ->add('weekend', 'date', array(
 
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr'   => array('class' => 'epi-weekend')
            ))
            ->add('weekOfYear', 'text', array(
                'attr'   => array('class' => 'epi-weekOfYear')
            ))
            ->add('year', 'text', array(
                'attr'   => array('class' => 'epi-year')
            ))
            ->add('sentinelSite', 'text')
            ->add('clinic', 'text')
 */       ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'SurveillanceTrend';
    }
}
