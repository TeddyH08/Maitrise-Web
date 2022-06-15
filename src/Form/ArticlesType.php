<?php

namespace App\Form;

use App\Entity\Articles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ArticlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name_articles', TextType::class, [
                'label' => "Nom de l'article",
                'constraints' => [
                    new Assert\NotBlank()
                ]
            ])
            ->add('image_articles', TextType::class, [
                'label' => "Image du site (1920*940)",
                'data' => "load.jpg"
            ])
            ->add('titlep1_articles', TextType::class, [
                'label' => "Premier titre",
                'required' => false
            ])
            ->add('textp1_articles', TextType::class, [
                'label' => "Premier texte",
                'required' => false
            ])
            ->add('titlep2_articles', TextType::class, [
                'label' => "Deuxième titre",
                'required' => false
            ])
            ->add('textp2_articles', TextType::class, [
                'label' => "Deuxième texte",
                'required' => false
            ])
            ->add('titlep3_articles', TextType::class, [
                'label' => "Troisième titre",
                'required' => false
            ])
            ->add('textp3_articles', TextType::class, [
                'label' => "Troisième texte",
                'required' => false
            ])
            ->add('image_annexe_articles', TextType::class, [
                'label' => "Image annexe (facultatif)",
                'required' => false
            ])
            ->add('link_articles', TextType::class, [
                'label' => "Lien de l'article",
                'required' => false
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
            'data_class' => Articles::class,
        ]);
    }
}