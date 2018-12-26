<?php

namespace App\Form;

use App\Entity\Property;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre de l\'annonce',
            ])
            ->add('description', TextareaType::class, [
                'attr' => ['rows' => 9],
                'label' => 'Description de l\'annonce',
            ])
            ->add('room', TextType::class, [
                'label' => 'Nombre de pièces',
            ])
            ->add('bedroom', TextType::class, [
                'label' => 'Nombre de chambres',
            ])
            ->add('garage', ChoiceType::class, [
                'choices' => [
                    'Oui' => true,
                    'non' => false,
                ],
                'label' => 'Garage',
            ])
            ->add('heater', ChoiceType::class, [
                'choices' => [
                    'Gaz' => 'Gaz',
                    'Electrique' => 'Electrique',
                    'Fioul' => 'Fioul',
                ],
                'label' => 'Chauffage',
            ])
            ->add('area', TextType::class, [
                'label' => 'Surface du bien en m²',
            ])
            ->add('garden', TextType::class, [
                'label' => 'Surface jardin en m²'
            ])
            ->add('city', TextType::class, [
                'label' => 'Commune',
            ])
            ->add('department', ChoiceType::class, [
                'choices' => [
                    'Meurthe-et-Moselle' => 'Meurthe-et-Moselle',
                    'Meuse' => 'Meuse',
                    'Moselle' => 'Moselle',
                    'Vosges' => 'Vosges',
                ],
                'label' => 'Département',
            ])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Appartement' => 'Appartement',
                    'Maison' => 'Maison',
                    'Terrain' => 'Terrain',
                ],
                'label' => 'Type de bien',
            ])
            ->add('price', TextType::class, [
                'label' => 'Prix du bien en €',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
        ]);
    }
}
