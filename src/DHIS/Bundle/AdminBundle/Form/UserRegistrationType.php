<?php

namespace DHIS\Bundle\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * UserRegistrationType,
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class UserRegistrationType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('displayname')
            ->add('username')
            ->add('email', 'repeated', array(
                'type'             => 'email',
                'invalid_message' => 'Enter the same address',
            ))
            ->add('rawPassword', 'password', array(
                    'always_empty' => false,
            ))
            ->add('isActive', 'checkbox', array(
                    'value'    => true,
                    'required' => false,
            ))
            ->add('isLock', 'checkbox', array(
                    'value'    => true,
                    'required' => false,
            ))
        ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'user_registration';
    }

}
