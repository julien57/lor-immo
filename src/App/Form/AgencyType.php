<?php

namespace App\Form;

use App\Model\AgencyDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgencyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description', TextareaType::class, [
                'label' => 'Description de l\'agence',
                'attr' => [
                    'rows' => 9
                ]
            ])
            ->add('image', FileType::class, [
                'label' => 'Image ou logo de l\'agence',
                'required' => false
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresse'
            ])
            ->add('postcode', TextType::class, [
                'label' => 'Code Postal'
            ])
            ->add('city', TextType::class, [
                'label' => 'Commune'
            ])
            ->add('phone', TelType::class, [
                'label' => 'N° de téléphone'
            ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse mail'
            ])
            ->add('website', UrlType::class, [
                'label' => 'Site Web'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AgencyDTO::class
        ]);
    }
}
