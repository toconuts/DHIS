<?php

namespace DHIS\Bundle\SComDisBundle\Form\Admin\District;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * DistrictRegistrationType,
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class DistrictEditType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('population')
        ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'district_edit';
    }

}
