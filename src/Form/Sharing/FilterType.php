<?php

namespace App\Form\Sharing;

use App\Form\Sharing\FilterModel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /**
         * @TODO
         *          All field = auto completion
         *          Status = select option ?
         *          Date Relance = date picker
         *          Date Fin = //
         *          Date Crea = //
         */
        $builder
            ->add('buyer', TextType::class, [
                'attr' => [
                    'placeholder' => 'Acheteur',
                    'class' => 'm-0'
                ],
            ])
            ->add('seller', TextType::class, [
                'attr' => [
                    'placeholder' => 'Vendeur',
                    'class' => 'm-0'
                ],
            ])
            ->add('candidateName', TextType::class, [
                'attr' => [
                    'placeholder' => 'Nom du candidat',
                    'class' => 'm-0'
                ],
            ])
            ->add('creationDate', DateType::class, [
                'attr' => [
                    'class' => 'm-0 p-0 col-sm-8'
                ],
            ])
            ->add('dateRelance', DateType::class, [
                'attr' => [
                    'class' => 'm-0 p-0 col-sm-8'
                ],
            ])
            ->add('sharingState', TextType::class, [
                'attr' => [
                    'placeholder' => 'Status',
                    'class' => 'm-0'
                ],
            ])
            ->add('endDate', DateType::class, [
                'attr' => [
                    'placeholder' => 'Candidate name',
                    'class' => 'm-0'
                ],
            ])
            ->add('send', SubmitType::class, [
                'attr' => [
                    'placeholder' => 'Candidate name',
                    'class' => 'btn btn-primary'
                ],
            ]);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FilterModel::class,
        ]);
    }
}
