<?php

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class RegisterType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        /*->add('role')*/
        ->add('name' , TextType::class,array('label'=>'Nombre ',
            'required'=>'required',
            'attr'=>array(
                'class'=>'form-name form-control')))
        ->add('surname', TextType::class,array('label'=>'Apellido ',
            'required'=>'required',
            'attr'=>array(
                'class'=>'form-surname form-control')))
         ->add('nick', TextType::class,array('label'=>'Apodo ',
            'required'=>'required',
            'attr'=>array(
                'class'=>'form-nick form-control')))
        ->add('email', EmailType::class,array('label'=>'Email ',
            'required'=>'required',
            'attr'=>array(
                'class'=>'form-email form-control')))
        ->add('password', PasswordType::class,array('label'=>'Password ',
            'required'=>'required',
            'attr'=>array(
                'class'=>'form-password form-control')))
        ->add('Registrarse',SubmitType::class, array(
            "attr"=>array(
                "class"=>"form-submit   btn btn-success")))
       
       /* ->add('bio')
        ->add('active')
        ->add('image')*/;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'backendBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'backendbundle_user';
    }


}
