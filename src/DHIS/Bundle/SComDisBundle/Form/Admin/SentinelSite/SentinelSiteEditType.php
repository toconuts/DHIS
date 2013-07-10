<?php

namespace DHIS\Bundle\SComDisBundle\Form\Admin\SentinelSite;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * SentinelSiteRegistrationType,
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class SentinelSiteEditType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
        ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'sentinelSite_edit';
    }

}
