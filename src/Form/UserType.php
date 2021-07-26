<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           /* ->add(
                'curriculumFile',
                VichFileType::class,
                [
                    'required'      => false,
                    'allow_delete'  => true, // not mandatory, default is true
                    'download_uri' => true, // not mandatory, default is true
                    'label' => 'Votre CV',
                ]
            )*/
           /* ->add(
                'description',
                TextareaType::class,
                [
                    'label' => 'Description',
                ]
                )*/;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
