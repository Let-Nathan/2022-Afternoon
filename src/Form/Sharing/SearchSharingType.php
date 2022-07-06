<?php

namespace App\Form\Sharing;

use Doctrine\DBAL\Types\DateType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
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
            ->add('buyer', TextType::class)
            ->add('seller', TextType::class)
            ->add('candidateName', TextType::class)
            ->add('creationDate', DateType::class)
            ->add('sharingState', TextType::class)
            ->add('endDate', TextType::class);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
