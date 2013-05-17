<?php

namespace DHIS\Bundle\SComDisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * OutCARPHAReportType,
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class OutCARPHAReportType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('weekend', 'date', array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr'   => array('class' => 'epi-weekend')
            ))
            ->add('weekOfYear', 'text', array(
                'attr'   => array('class' => 'epi-weekOfYear')
            ))
            ->add('year', 'text', array(
                'attr'   => array('class' => 'epi-year')
            ))
            ->add('totalSites', 'text')
        ;
        
        /*$builder
            ->addValidator(new \Symfony\Component\Form\CallbackValidator(function($form) {
                if (!$form['weekend']->getData()) {
                    $form['weekend']->addError(new \Symfony\Component\Form\FormError('AAAAAAAAAA'));
                }
            }))
        ;*/
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'OutCARPHAReport';
    }
}