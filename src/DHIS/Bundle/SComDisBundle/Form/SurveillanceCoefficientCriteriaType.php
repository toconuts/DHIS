<?php

namespace DHIS\Bundle\SComDisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * OutDailyTallyReportType
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class SurveillanceCoefficientCriteriaType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('target_year', 'text')
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
            ->add('year_choices')
            ->add('syndromes')
            ->add('useNoRecords', 'checkbox', array(
                  'required' => false,
            ))
            ->add('useLandwideSD', 'checkbox', array(
                  'required' => false,
            ))
            ->add('showIslandwide', 'checkbox', array(
                  'required' => false,
            ))
        ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'SurveillanceCoefficient';
    }
}
