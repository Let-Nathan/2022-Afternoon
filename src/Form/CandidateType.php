<?php

namespace App\Form;

use App\Entity\Candidate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('curiculumVitae')
            ->add('firstName')
            ->add('lastName')
            ->add('phone')
            ->add('email')
            ->add('city')
            ->add('linkedin')
            ->add('telework')
            ->add('vehicle')
            ->add('salary')
            ->add('validateSheet')
            ->add('observation')
            ->add('createdAt')
            ->add('archived')
            ->add('isVisible')
            ->add('gender')
            ->add('expirationDate')
            ->add('user')
            ->add('experience')
            ->add('skills')
            ->add('domains')
            ->add('prime')
            ->add('disponibilities')
            ->add('businessRole')
            ->add('mobilities')
            ->add('validatedBy')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
        ]);
    }
}
