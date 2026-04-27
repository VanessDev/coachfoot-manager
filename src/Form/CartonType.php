<?php

namespace App\Form;

use App\Entity\Carton;
use App\Entity\Joueur;
use App\Entity\Rencontre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CartonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('couleurCarton', ChoiceType::class, [
                'choices' => [
                    'Jaune' => 'jaune',
                    'Rouge' => 'rouge',
                ],
            ])
            ->add('dateCarton')
            ->add('motif')
            ->add('joueur', EntityType::class, [
                'class' => Joueur::class,
                'choice_label' => function (Joueur $joueur) {
                    return $joueur->getPrenom() . ' ' . $joueur->getNom();
                },
            ])
            ->add('rencontre', EntityType::class, [
                'class' => Rencontre::class,
                'choice_label' => function (Rencontre $rencontre) {
                    return $rencontre->getDateMatch()->format('d/m/Y') . ' - vs ' . $rencontre->getAdversaire();
                },
                'required' => false,
                'placeholder' => 'Aucune rencontre',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Carton::class,
        ]);
    }
}