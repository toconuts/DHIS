<?php

namespace DHIS\Bundle\SComDisBundle\Form\Admin\Clinic;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * ClinicRegistrationType,
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class ClinicRegistrationType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('id')
            ->add('name')
            ->add('code')
            ->add('sentinelSite')
            ->add('district')
        ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'clinic_registration';
    }

}
