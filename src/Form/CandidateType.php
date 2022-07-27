<?php

namespace App\Form;

use App\Entity\Admin;
use App\Entity\BusinessRole;
use App\Entity\Candidate;
use App\Entity\Disponibility;
use App\Entity\Domain;
use App\Entity\Experience;
use App\Entity\Skill;
use App\Entity\User;
use Hoa\Compiler\Llk\Rule\Choice;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class CandidateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Prénom',
                ],
                'row_attr' => [
                    'class' => 'form-floating mb-3',
                ],
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Nom',
                ],
                'row_attr' => [
                    'class' => 'form-floating mb-3',
                ],
            ])
            ->add('phone', TelType::class, [
                'label' => 'Tel',
                'attr' => [
                    'placeholder' => 'Tel',
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
                'attr' => [
                    'placeholder' => 'Mail',
                ],
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
                'attr' => [
                    'placeholder' => 'Ville',
                ],

            ])
            ->add('linkedin', UrlType::class, [
                'label' => 'URL Linkedin',
                'attr' => [
                    'placeholder' => 'URL Linkedin',
                ],
                'required' => false,
            ])
            ->add('telework', ChoiceType::class, [
                'label' => 'Télétravail',
                'attr' => [

                    'class' => 'mb-3',
                ],
                'placeholder' => 'Télétravail ?',
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'required' => true,
            ])
            ->add('vehicle', ChoiceType::class, [
                'label' => 'Véhiculé',
                'attr' => [
                    'class' => 'mb-3',
                ],
                'placeholder' => 'Candidat véhiculé ?',
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'required' => true,
            ])
                ->add('salary', NumberType::class, [
                'label' => 'Salaire',
                'attr' => [
                    'placeholder' => 'Salaire',
                ],
                'required' => true,
            ])
             ->add('validateSheet', ChoiceType::class, [
                 'label' => 'Fiche validée ?',
                 'choices' => [
                     'Oui' => true,
                     'Non' => false,
                 ]
             ])
            ->add('observation', TextareaType::class, [
                'label' => 'Observations',
                'attr' => [
                    'placeholder' => 'Observations',
                ],
                'required' => false,
            ])
            ->add('archived', CheckboxType::class, [
                'label' => 'Archiver la fiche',
                'attr' => [
                    'class' => 'mb-3',
                ],
                'required' => false,
            ])
            ->add('gender', ChoiceType::class, [
                'label' => 'Genre',
                'placeholder' => 'Genre',
                'choices' => [
                    'Masculin' => true,
                    'Féminin' => false,
                ],
                'attr' => [
                    'placeholder' => 'Genre',
                ],
            ])
            ->add('experience', EntityType::class, [
                'label' => 'Expérience',
                'class' => Experience::class,
                'choice_label' => 'name',
                'attr' => [
                    'placeholder' => 'Nombre d\'années d\'expérience',
                ],
            ])
            ->add('skills', EntityType::class, [
                'label' => 'Compétences',
                'class' => Skill::class,
                'choice_label' => 'skillName',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('domains', EntityType::class, [
                    'class' => Domain::class,
                    'multiple' => true,
                    'expanded' => true,
                    'choice_label' => 'domaineName',
            ])
            ->add('prime', NumberType::class, [
                'label' => 'Prime',
                'attr' => [
                    'placeholder' => 'Prime',
                ],
                'required' => false,
            ])
            ->add('disponibilities', EntityType::class, [
                'label' => 'Disponibilités',
                'class' => Disponibility::class,
                'multiple' => false,
                'expanded' => false,
                'choice_label' => 'disponibility',
            ])
            ->add('businessRole', EntityType::class, [
                'label' => 'Rôle',
                'class' => BusinessRole::class,
                'choice_label' => 'businessRoleName',
                'attr' => [
                    'placeholder' => 'Rôle',
                ],
            ])
            ->add('user', EntityType::class, [
                'label' => 'Vendeur',
                'class' => User::class,
                'choice_label' => 'email',
                'attr' => [
                    'placeholder' => 'Email du vendeur',
                ],
                'expanded' => false,
                'multiple' => false,
            ])
            ->add('validatedBy', EntityType::class, [
                'label' => 'Admin',
                'class' => Admin::class,
                'choice_label' => 'firstName',
                'attr' => [
                    'placeholder' => 'Fiche validé par :'
                ]
            ])
            ->add('cvFile', VichFileType::class, [
                'required'      => false,
                'allow_delete'  => false, // not mandatory, default is true
                'download_uri' => false, // not mandatory, default is true
            ])
            ->add('createdAt', DateTimeType::class, [
                'widget' => 'single_text',
                'row_attr' => ['hidden'],
            ]);

            // ->add('mobilities')
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,

        ]);
    }
}
