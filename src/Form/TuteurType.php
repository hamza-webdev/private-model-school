<?php

namespace App\Form;

use App\Entity\Tuteur;
use App\Entity\Student;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Form\StudentType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name_father', TextType::class, [
                    'help' => 'The father name is important.',
                    ])
            ->add('name_mather', TextType::class)
            ->add('telephone_father', TextType::class)
            ->add('telephone_mother', TextType::class)
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class)
            ->add('adresse', TextType::class)
            ->add('city', TextType::class)
            ->add('students', CollectionType::class, [
                'entry_type' => StudentType::class,
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'attr' => ['class' => 'fieldset-student'],
                'error_bubbling' => false

                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tuteur::class,
        ]);
    }
}
