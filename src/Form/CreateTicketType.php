<?php

namespace App\Form;

use App\Entity\Tickets;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateTicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ticketTitle')
            ->add('openTime')
            ->add('closeTime')
            ->add('priority')
            ->add('assignTo')
            ->add('reOpen')
            ->add('userId')
            ->add('ticketStatus')
            ->add('openTimee')
            ->add('closeTimee')
            ->add('user')
            ->add('description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tickets::class,
        ]);
    }
}
