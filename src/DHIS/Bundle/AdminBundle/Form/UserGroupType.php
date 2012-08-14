<?php

namespace DHIS\Bundle\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * UserGroupType,
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class UserGroupType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('groups')
        ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'user_group';
    }
}
