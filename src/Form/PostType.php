<?php


namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\NotBlank;

class PostType extends AbstractType
{
    protected $title;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
      ->add('title', TextType::class, array(
        'required' => true,
        'constraints' => array(new NotBlank())
      ))
      ->add('image', FileType::class, array(
        'constraints' => array(new Image(array(
          'mimeTypes' => 'image/jpeg,
                          image/png'
        )))
      ))
      ->add('body', TextareaType::class, array(
        'required' => true,
        'constraints' => array(new NotBlank())
      ))
      ->add('publish_date', DateType::class, array(
        'required' => true,
        'constraints' => array(new Date())
      ))
      ->add('save', SubmitType::class, array(
        'label' => 'Create Post'
      ))
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
      'data_class' => Post::class,
    ));
    }
}
