<?php

namespace App\Form;

use App\Entity\Users;
use App\Entity\Roles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Validator\Constraints as Assert;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name_users', TextType::class, [
                'label' => "Nom",
                'constraints' => [
                    new Assert\NotBlank()
                ]
            ])
            ->add('firstname_users', TextType::class, [
                'label' => "Prénom",
                'constraints' => [
                    new Assert\NotBlank()
                ]
            ])
            ->add('imgprofil_users', TextType::class, [
                'label' => "Image de profil",
                'data' => "user.png"
            ])
            ->add('mail_users', EmailType::class, [
                'label' => "Adresse mail",
                'constraints' => [
                    new Assert\NotBlank()
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => [
                    'label' => "Mot de passe",
                ],
                'second_options' => [
                    'label' => "Confirmation du mot de passe"
                ],
                'invalid_message' => "Les mots de passe ne  correspondent pas",
                'constraints' => [
                    new Assert\NotBlank()
                ]
            ])
            ->add('roles_users',  EntityType::class, [
                'class' => Roles::class,
                'choice_label' => 'name_roles',
                'label' => 'Rôle',
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'envoi'
                ],
                'label' => 'Inscription'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
