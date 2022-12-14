<?php

namespace App\Form;

use App\Entity\Teacher;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeacherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                        'label' => 'Name',
                        'attr' => [
                            'placeholder' => 'Name',
                        ],
                        'row_attr' => [
                            'class' => 'form-floating',
                        ],
            ])
            ->add('email', EmailType::class, [
                'label' => '@',
                'row_attr' => [
                    'class' => 'input-group',
                ],
            ])
            ->add('telephone')
            ->add('gendre')
            ->add('specializations')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Teacher::class,
        ]);
    }
}
