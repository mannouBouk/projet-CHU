<?php

namespace App\Form;

use App\Entity\Patient;
use App\Entity\Service;
use App\Entity\RegimeAL;
use PhpParser\Node\Stmt\Label;
use Doctrine\ORM\RegimeALRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Util\StringUtil;
use Symfony\Component\VarDumper\Cloner\Data;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

class PatientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add(
                'nom',
                TextType::class,
                [
                    'translation_domain' => false
                ]
            )
            ->add(
                'prenom',
                TextType::class,
                [
                    'translation_domain' => false
                ]
            )
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
            )
            ->add(
                'regimes',
                ChoiceType::class,
                [
                    'choices' => [
                        'sans sel' => 2,
                        'pauvre en K+' => 3,
                        'diabétique' => 4,
                    ],
                    'multiple' => false,
                ]
            ) 
            ->add('dateEntree', DateType::class, [
                'widget' => 'single_text', 'input'  => 'datetime_immutable', 'required' => true, 'translation_domain' => false
            ])
            ->add('dateSortie', DateType::class, [
                'widget' => 'single_text', 'input'  => 'datetime_immutable', 'translation_domain' => false

            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Patient::class,
        ]);
    }
}
