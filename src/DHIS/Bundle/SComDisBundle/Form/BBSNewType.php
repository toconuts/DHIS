<?php

namespace DHIS\Bundle\SComDisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * BBSNewType,
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class BBSNewType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('message')
        ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'bbs_new';
    }

}
