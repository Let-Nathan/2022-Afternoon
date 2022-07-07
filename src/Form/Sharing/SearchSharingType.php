<?php

namespace App\Form\Sharing;

use App\Form\Sharing\SharingModel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchSharingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /**
         * @TODO Status & Creation date verify
         */
        $builder
            ->add('buyer', TextType::class)
            ->add('seller', TextType::class)
            ->add('candidateName', TextType::class)
            ->add('creationDate', DateType::class)
            ->add('dateRelance', DateType::class)
            ->add('sharingState', TextType::class)
            ->add('endDate', DateType::class)
            ->add('send', SubmitType::class);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SharingModel::class,
        ]);
    }
}
