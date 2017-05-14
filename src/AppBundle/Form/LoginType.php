<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

/**
 * Class LoginType
 * @package AppBundle\Form
 */
class LoginType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email',    EmailType::class)
            ->add('password', PasswordType::class);
    }

    /**
     * Get block prefix
     * @return null
     */
    public function getBlockPrefix() {
        return null;
    }
}