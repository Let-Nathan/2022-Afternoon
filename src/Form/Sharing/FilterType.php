<?php

namespace App\Form\Sharing;

use App\Entity\Consultation;
use App\Entity\User;
use App\Repository\ConsultationRepository;
use App\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
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
         *          Date filter = Add label
         */
        $builder

            ->add('buyer', TextType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nom de l\'acheteur'
                ]
                ])
            ->add('seller', TextType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nom du vendeur',
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
                'placeholder' => 'Choix du statut',
                'choices' => [
                    'Consultation' => [
                        'Recrutement' => 'recrutement',
                        'Entretien' => 'entretien',
                        'Consulté' => 'consulté',
                        'Refusé' => 'refusé',
                    ]
                ],
                'attr' => [
                    'placeholder' => 'Statut',
                ],
            ])
            ->add('endDate', DateType::class, [
                    'label' => 'Date de relance',
                    'label_attr' => ['class' => 'ser-only'],
                    'required' => false,
                    'widget' => 'single_text',
            ])
            ->add('send', SubmitType::class, [
                'label' => 'Rechercher'
            ])
            ->add('reset', ResetType::class, [
                'label' => 'Réinitialiser'
            ]);
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
