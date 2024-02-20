<?php

namespace App\Form;

use App\Entity\Demande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class DemandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomVictime')
            ->add('numConstat')
            ->add('dateRealisation')
            ->add('localisation')
            // ->add('etatDemande', ChoiceType::class, [
            //     'choices' => [
            //         'En cours' => 'en_cours',
            //         'Traité' => 'traitee'
            //     ],
            //     'placeholder' => 'Sélectionner l\'état de la demande',
            //     'required' => true,
            // ])
            ->add('user');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Demande::class,
        ]);
    }
}
