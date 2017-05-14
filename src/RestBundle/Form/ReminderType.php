<?php

// src/RestBundle/Form/ReminderType.php
namespace RestBundle\Form;

use AppBundle\Entity\Reminder;
use RestBundle\Form\ReminderAlarmType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

/**
 * Class ReminderType
 * @package RestBundle\Form
 */
class ReminderType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('enabled',   CheckboxType::class)
            ->add('duration',  IntegerType::class)
            ->add('frequency', IntegerType::class)
            ->add('increment', IntegerType::class)
            ->add('alarms',    CollectionType::class, array(
                'entry_type' => ReminderAlarmType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Reminder::class,
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