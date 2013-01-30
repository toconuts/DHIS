<?php

namespace DHIS\Bundle\SComDisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * OutbreakType,
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class OutbreakType extends AbstractType
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
            ->add('syndrome')
            ->add('reportedBy')
            ->add('reportedAt', 'date', array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr'   => array('class' => 'epi-date')
            ))
            ->add('outbreakItems', 'collection', array(
                'type' => new OutbreakItemsType(),
            ))
        ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'outbreak';
    }
}
