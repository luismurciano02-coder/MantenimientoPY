<?php

namespace App\Form;

use App\Entity\Factura;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FacturaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('concepto')
            ->add('fecha')
            ->add('importe')
            ->add('usuario', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'nombre',
                'label' => 'Usuario',
                'placeholder' => 'Seleccione un usuario',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Factura::class,
        ]);
    }
}
