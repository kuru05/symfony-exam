<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Event;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\NotBlank;

class EventFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre de l\'événement',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Ex: Conférence Symfony'],
                'constraints' => [new NotBlank()],
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'label' => 'Catégorie',
                'attr' => ['class' => 'form-select'],
            ])
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date et heure',
                'attr' => ['class' => 'form-control'],
                'constraints' => [new NotBlank(), new GreaterThan('today')],
                'input' => 'datetime',
            ])
            ->add('location', TextType::class, [
                'label' => 'Lieu',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Ex: Paris, Lyon, En ligne...'],
                'constraints' => [new NotBlank()],
            ])
            ->add('maxPlaces', IntegerType::class, [
                'label' => 'Nombre de places maximum',
                'attr' => ['class' => 'form-control', 'min' => 1],
                'constraints' => [new NotBlank(), new GreaterThan(0)],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => ['class' => 'form-control', 'rows' => 5],
                'constraints' => [new NotBlank()],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
