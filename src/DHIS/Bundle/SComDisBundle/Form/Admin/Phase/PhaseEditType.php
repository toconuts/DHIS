<?php

namespace DHIS\Bundle\SComDisBundle\Form\Admin\Phase;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * PhaseRegistrationType,
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class PhaseEditType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('threshold')
            ->add('color')
        ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'phase_edit';
    }

}
