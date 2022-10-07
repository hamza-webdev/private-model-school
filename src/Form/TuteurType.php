<?php

namespace App\Form;

use App\Entity\Tuteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name_father')
            ->add('name_mather')
            ->add('telephone_father')
            ->add('telephone_mother')
            ->add('email')
            ->add('password')
            ->add('adresse')
            ->add('city')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tuteur::class,
        ]);
    }
}
