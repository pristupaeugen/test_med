<?php

// src/RestBundle/Form/ReminderAlarmType.php
namespace RestBundle\Form;

use AppBundle\Entity\ReminderAlarm;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

/**
 * Class ReminderAlarmType
 * @package RestBundle\Form
 */
class ReminderAlarmType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('time',       IntegerType::class)
            ->add('dose_value', IntegerType::class)
            ->add('dose_label', TextType::class);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => ReminderAlarm::class,
        ));
    }

    /**
     * Get block prefix
     * @return null
     */
    public function getBlockPrefix() {
        return null;
    }
}