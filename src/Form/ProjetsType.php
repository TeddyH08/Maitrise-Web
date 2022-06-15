<?php

namespace App\Form;

use App\Entity\Etapes;
use App\Entity\Types;
use App\Entity\Projets;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProjetsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name_projet', TextType::class, [
                'label' => "Nom du projet",
                'constraints' => [
                    new Assert\NotBlank()
                ]
            ])
            ->add('image_projet', TextType::class, [
                'label' => "Image du site (1920*940)",
                'data' => "load.jpg"
            ])
            ->add('link_projet', TextType::class, [
                'label' => "Lien du projet",
                'constraints' => [
                    new Assert\NotBlank()
                ]
            ])
            ->add('type_projet',  EntityType::class, [
                'class' => Types::class,
                'choice_label' => 'name_types',
                'label' => 'Type de site',
            ])
            ->add('etape_projet',  EntityType::class, [
                'class' => Etapes::class,
                'choice_label' => 'name_etapes',
                'label' => 'Etape du site',
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
            'data_class' => Projets::class,
        ]);
    }
}
