<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ActorSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('searchField', TextType::class,
        [
            'label' => false,
            'attr' => [
                'placeholder' => 'Rechercher un acteur',
                'id' => 'inputSearch'
            ]
        ]);
    }
}
