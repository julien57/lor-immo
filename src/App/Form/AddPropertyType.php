<?php

namespace App\Form;

use App\Model\PropertyDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddPropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('photo', CollectionType::class, [
                'entry_type' => PhotoType::class,
                'allow_add' => true,
                'entry_options' => [
                    'label' => false
                ],
                'label' => false,
                'by_reference' => false
            ]);

        parent::buildForm($builder, $options);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PropertyDTO::class
        ]);
    }

    public function getParent()
    {
        return PropertyType::class;
    }
}
