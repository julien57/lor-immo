<?php

namespace App\Form;

use App\Model\SearchPropertyDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchPropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Maison' => 'Maison',
                    'Appartement' => 'Appartement',
                    'Terrain' => 'Terrain'
                ],
                'label' => 'Type de bien'
            ])
            ->add('department', ChoiceType::class, [
                'choices' => [
                    'Meurthe-et-Moselle' => 'Meurthe-et-Moselle',
                    'Meuse' => 'Meuse',
                    'Moselle' => 'Moselle',
                    'Vosges' => 'Vosges'
                ],
                'label' => 'Département',
                'required' => false
            ])
            ->add('minPrice', TextType::class, [
                'label' => 'Prix minimum',
                'required' => false
            ])
            ->add('maxPrice', TextType::class, [
                'label' => 'Prix maximum',
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchPropertyDTO::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
