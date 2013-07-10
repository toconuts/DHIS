<?php

namespace DHIS\Bundle\SComDisBundle\Form\Admin\Syndrome4Outbreak;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * Syndrome4OutbreakRegistrationType,
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class Syndrome4OutbreakEditType extends AbstractType
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
        return 'syndrome4outbreak_edit';
    }

}
