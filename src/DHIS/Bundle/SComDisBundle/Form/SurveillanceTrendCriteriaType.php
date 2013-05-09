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
              ->add('year_choices')
              ->add('syndromes')
              ->add('useSeriesSyndromes', 'checkbox', array(
                  'required' => false,
              ))
              ->add('sentinelSites')
         ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'SurveillanceTrend';
    }
}
