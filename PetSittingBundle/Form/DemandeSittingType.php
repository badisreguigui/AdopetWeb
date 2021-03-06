<?php

namespace PetSittingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class DemandeSittingType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('chat')
            ->add('chien')
            ->add('autre')
            ->add('date_debut_demande')
            ->add('date_fin_demande')
            ->add('tmp_debut')
            ->add('tmp_fin')
            ->add('promenade')
            ->add('nourriture')
            ->add('visite')
            ->add('description',TextareaType::class)
            ->add('lieu',ChoiceType::class, array(
                'choices' => array(
                    'Ariana' => 'Ariana',
                    'Ben arous' => 'Ben arous',
                    'Bizerte' => 'Bizerte',
                    'Béja' => 'Béja',
                    'Gabès' => 'Gabès',
                    'Gafsa' => 'Gafsa',
                    'Jendouba' => 'Jendouba',
                    'Kairouan' => 'Kairouan',
                    'Kasserine' => 'Kasserine',
                    'Kélibia' => 'Kélibia',
                    'La manouba' => 'La manouba',
                    'Le kef' => 'Le kef',
                    'Mahdia' => 'Mahdia',
                    'Monastir' => 'Monastir',
                    'Médenine' => 'Médenine',
                    'Nabeul' => 'Nabeul',
                    'Sfax' => 'Sfax',
                    'Sidi bouzid' => 'Sidi bouzid',
                    'Silana' => 'Silana',
                    'Sousse' => 'Sousse',
                    'Tataouine' => 'Tataouine',
                    'Tozeur' => 'Tozeur',
                    'Tunis' =>   'Tunis',
                    'Zaghouan' => 'Zaghouan',
                )))
            ->add('num_tel')
            ->add('prix_souhaite')
            ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PetSittingBundle\Entity\DemandeSitting'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'petsittingbundle_demandesitting';
    }


}
