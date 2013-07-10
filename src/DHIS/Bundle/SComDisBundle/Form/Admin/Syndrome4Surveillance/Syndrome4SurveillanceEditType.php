<?php

namespace DHIS\Bundle\SComDisBundle\Form\Admin\Syndrome4Surveillance;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * Syndrome4SurveillanceRegistrationType,
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class Syndrome4SurveillanceEditType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('displayId')
        ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'syndrome4surveillance_edit';
    }

}
