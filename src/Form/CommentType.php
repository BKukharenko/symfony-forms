<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

class CommentType extends AbstractType {

  public function buildForm(FormBuilderInterface $builder, array $options)
  {

    $builder
      ->add('name', TextType::class, array(
        'required' => true,
        'constraints' => array(
          new NotBlank(),
          new Type( array(
            'type' => 'string'
            )
          ))
      ))
      ->add('email', EmailType::class, array(
        'required' => true,
        'constraints' => array(
          new NotBlank(),
          new Email(array(
            'mode' => 'loose'
          )))
      ))
      ->add('body', TextareaType::class, array(
        'required' => true,
        'constraints' => array(new NotBlank())
      ))
      ->add('save', SubmitType::class, array(
        'label' => 'Add Comment'
      ))
    ;
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => PostType::class,
    ));
  }

}