<?php

namespace DHIS\Bundle\CommonBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * UserProfileType,
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class UserProfileType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('displayname')
            ->add('username', 'text', array(
                'read_only' => true,
            ))
            ->add('email', 'repeated', array(
                'type'             => 'email',
                'invalid_message' => 'Enter the same address',
            ))
            ->add('changePassword', 'checkbox', array(
                  'required' => false,
                  'property_path' => false,
            ))
            ->add('rawPassword', 'password', array(
                  'always_empty' => false,
                  'property_path' => false,
            ))
            ->add('newRawPassword', 'repeated', array(
                'type'             => 'password',
                'invalid_message' => 'Enter the same new password',
                'property_path' => false,
            ))
            ->add('groups')
        ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'user_profile';
    }

}
