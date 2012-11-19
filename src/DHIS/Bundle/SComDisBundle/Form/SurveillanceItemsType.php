<?php

namespace DHIS\Bundle\SComDisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * SurveillanceItemsType,
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class SurveillanceItemsType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('syndrome', 'text', array(
                'read_only' => true,
            ))
            ->add('sunday', 'integer')
            ->add('monday', 'integer')
            ->add('tuesday', 'integer')
            ->add('wednesday', 'integer')
            ->add('thursday', 'integer')
            ->add('friday', 'integer')
            ->add('saturday', 'integer')
            ->add('referrals', 'text', array(
                'required' => false,
            ))
        ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'surveillance_items';
    }
}
