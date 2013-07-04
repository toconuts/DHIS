<?php

namespace DHIS\Bundle\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * GroupEditType,
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class GroupEditType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('id', 'text', array(
                'read_only' => true,
            ))
            ->add('name')
            ->add('role')
        ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'group_edit';
    }
}
