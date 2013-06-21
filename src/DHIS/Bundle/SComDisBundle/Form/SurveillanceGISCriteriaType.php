<?php

namespace DHIS\Bundle\SComDisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * SurveillanceGISCriteriaType
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class SurveillanceGISCriteriaType extends AbstractType
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
              ->add('useNoRecords', 'checkbox', array(
                  'required' => false,
              ))
              ->add('useIslandwideSD', 'checkbox', array(
                  'required' => false,
              ))
         ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'SurveillanceGIS';
    }
}
