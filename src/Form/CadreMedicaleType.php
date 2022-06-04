<?php

namespace App\Form;

use App\Entity\CadreMedicale;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CadreMedicaleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add(
                'services',
                ChoiceType::class,
                [
                    'choices' => [
                        'endocrino' => 1,
                        'neurologie' => 2,
                        'pédiatrie' => 3,
                        'gastrologie' => 4,
                    ],
                    'multiple' => false,
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CadreMedicale::class,
        ]);
    }
}
