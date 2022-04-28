<?php

namespace App\Form;

use App\Entity\Patient;
use App\Entity\RegimeAL;
use App\Entity\Service;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;


use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

class PatientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('nom')
            ->add('prenom')
            ->add('services')
            ->add('regimes')
            ->add('dateEntree', DateType::class, [
                'widget' => 'single_text', 'input'  => 'datetime_immutable'
            ])
            ->add('dateSortie', DateType::class, [
                'widget' => 'single_text', 'input'  => 'datetime_immutable'

            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Patient::class,
        ]);
    }
}
