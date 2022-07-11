<?php

namespace App\Form\Sharing;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /**
         * @TODO
         *          All field = auto completion
         *          Status = select option ?
         *          Date filter = Display on field, on click : 'date creation', 'date end' ... ?
         */
        $builder

            ->add('buyer', TextType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Acheteur',
                    'class' => 'm-0'
                ],
            ])
            ->add('seller', TextType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Vendeur',
                    'class' => 'm-0'
                ],
            ])
            ->add('candidateName', TextType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nom du candidat',
                ],
            ])
            ->add('creationDate', DateType::class, [
                'label' => 'Date de relance',
                'label_attr' => ['class' => 'ser-only'],
                'required' => false,
                'widget' => 'single_text',
            ])
            ->add('dateRelance', DateType::class, [
                //Maybe
                'label' => 'Date de relance',
                'label_attr' => ['class' => 'ser-only'],
                'required' => false,
                'widget' => 'single_text',
            ])
            ->add('status', ChoiceType::class, [
                'required' => false,
                'placeholder' => 'Choix du du status',
                'choices' => [
                    'Consultation' => [
                        'Accepted' => 'accepted',
                        'Entretien' => 'entretien',
                        'Refused' => 'refused',
                    ]
                ],
                'attr' => [
                    'placeholder' => 'Status',
                ],
            ])
            ->add('endDate', DateType::class, [
                    'label' => 'Date de relance',
                    'label_attr' => ['class' => 'ser-only'],
                    'required' => false,
                    'widget' => 'single_text',
            ])
            ->add('send', SubmitType::class);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FilterModel::class,
            'method' => 'GET',
            'csrf_protection' => false,
        ]);
    }
}
