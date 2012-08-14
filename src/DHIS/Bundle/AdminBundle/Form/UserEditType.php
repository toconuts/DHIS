<?php

namespace DHIS\Bundle\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * UserRegistrationType,
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class UserEditType extends AbstractType
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
            ->add('displayname')
            ->add('username', 'text', array(
                'read_only' => true,
            ))
            ->add('email', 'repeated', array(
                'type'             => 'email',
                'invalid_message' => 'Enter the same address',
            ))
            ->add('isActive', 'checkbox', array(
                    'value'    => true,
                    'required' => false,
            ))
            ->add('isLock', 'checkbox', array(
                    'value'    => true,
                    'required' => false,
            ))
            ->add('groups')
        ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'user_edit';
    }

}
