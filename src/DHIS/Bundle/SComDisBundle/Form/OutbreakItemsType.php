<?php

namespace DHIS\Bundle\SComDisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * OutbreakItemsType,
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class OutbreakItemsType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('dayOfTheWeekString', 'text', array(
                'read_only' => true,
            ))
            ->add('ageGroup1F', 'integer')
            ->add('ageGroup1M', 'integer')
            ->add('ageGroup2F', 'integer')
            ->add('ageGroup2M', 'integer')
            ->add('ageGroup3F', 'integer')
            ->add('ageGroup3M', 'integer')
            ->add('ageGroup4F', 'integer')
            ->add('ageGroup4M', 'integer')
            ->add('ageGroup5F', 'integer')
            ->add('ageGroup5M', 'integer')
            ->add('ageGroup6F', 'integer')
            ->add('ageGroup6M', 'integer')
            ->add('ageGroup7F', 'integer')
            ->add('ageGroup7M', 'integer')
        ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'outbreak_items';
    }
}
