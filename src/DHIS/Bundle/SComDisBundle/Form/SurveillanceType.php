<?php

namespace DHIS\Bundle\SComDisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * SurveillanceType,
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class SurveillanceType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
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
            ->add('sentinelSite')
            ->add('clinic')
            ->add('reportedBy')
            ->add('reportedAt', 'date', array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr'   => array('class' => 'epi-date')
            ))
            ->add('surveillanceItems', 'collection', array(
                'type' => new SurveillanceItemsType(),
            ))
        ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'surveillance';
    }
}
