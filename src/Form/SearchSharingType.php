<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchSharingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /**
         * @TODO Status & Creation date verify
         */
        $builder
            ->add('Seller', SearchType::class, [
            ]);
//            ->add('Seller', SearchType::class, [
//                'required' => false,
//            ])
//            ->add('CandidateName', SearchType::class, [
//                'required' => false,
//            ])
//            ->add('CreationDate', ChoiceType::class, [
//                'choices' => [
//                    'Creation Date' => [
//                    'ASC' => 'ASC',
//                    'DESC' => 'DESC',
//                    ]
//                ],
//
//            ]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
