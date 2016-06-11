<?php

namespace AdminBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label' => 'Enter Category : ',
                'label_attr' => array(
                    'class' => 'col-sm-2 control-label',
                    'for' => 'title'
                ),
                'attr' => array(
                    'placeholder' => 'Enter Category ...',
                    'class' => 'form-control',
                    'id' => 'title'
                )
            ))
            ->add('parent', EntityType::class, array(
                'label' => 'Select parent category',
                'label_attr' => array(
                    'class' => 'col-sm-2 control-label',
                    'for' => 'parent'
                ),
                'placeholder' => "-- Parent Category --",
                'class' => 'AdminBundle\Entity\Category',
                'choice_label' => 'title',
                'required' => false,
                'attr' => array(
                    'class' => 'form-control',
                    'id' => 'parent'
                ),
            ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\Category'
        ));
    }
}