<?php

namespace App\Form;

use App\Entity\Music;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class MusicFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Set video title',
//                'data'  => 'Example title',
                'required' => false,
            ])
            /*  ->add('created_at', DateType::class, [
                  'label'  => 'Set date',
                  'widget' => 'single_text',
              ])*/
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'Agree?',
                'mapped' => false,
            ])
            ->add('file', FileType::class, array(
                'label' => 'Music (MP4 file)'
            ))
            ->add('save', SubmitType::class, ['label' => 'Add a video'])
        ;
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event)
        {
            $music = $event->getData();
            $form = $event->getForm();
            if (!$music || null === $music->getId())
            {
                $form->add('created_at', DateType::class, [
                    'label'  => 'Set date',
                    'widget' => 'single_text',
                ]);
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Music::class,
        ]);
    }
}
