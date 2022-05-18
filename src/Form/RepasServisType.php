<?php

namespace App\Form;

use App\Entity\RepasServis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\Request;


class RepasServisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('DateHeure', DateType::class, [
                'widget' => 'single_text', 'input'  => 'datetime_immutable', 'required' => true,
            ])
            ->add('servis')
            ->add('patient');
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RepasServis::class,
        ]);
    }
}
