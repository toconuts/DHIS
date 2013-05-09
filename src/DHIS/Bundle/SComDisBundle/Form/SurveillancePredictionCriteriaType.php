<?php

namespace DHIS\Bundle\SComDisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * SurveillancePredictionCriteriaType
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class SurveillancePredictionCriteriaType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
              ->add('target_year', 'text')
              ->add('year_choices')
              ->add('syndromes')
              ->add('useSeriesSyndromes', 'checkbox', array(
                  'required' => false,
              ))
              ->add('sentinelSites')
              ->add('useNoRecords', 'checkbox', array(
                  'required' => false,
              ))
              ->add('confidence_coefficient')
         ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'SurveillancePrediction';
    }
}
