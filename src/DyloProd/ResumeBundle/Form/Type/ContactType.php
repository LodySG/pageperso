<?php

namespace DyloProd\ResumeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints\IsTrue as RecaptchaTrue;

class ContactType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text',array(
                'label' => 'Nom : ',
                'label_attr' => array('class' => 'quatre'),
                'attr' => array('class' => 'un quatre')
            ))
            ->add('prenom','text',array(
                'label' => 'Prenom : ',
                'label_attr' => array('class' => 'quatre'),
                'attr' => array('class' => 'un quatre')
            ))
            ->add('email','email',array(
                'label' => 'Email : ',
                'label_attr' => array('class' => 'quatre'),
                'attr' => array('class' => 'un quatre')
            ))
            ->add('sujet','text',array(
                'label' => 'Sujet : ',
                'label_attr' => array('class' => 'quatre'),
                'attr' => array('class' => 'un quatre')
            ))
            ->add('message','textarea',array(
                'label' => 'Message : ',
                'label_attr' => array('class' => 'quatre'),
                'attr' => array('rows' => '8',
                                'class' => 'un quatre')
            ))
            ->add('recaptcha', 'ewz_recaptcha', array(
                'label' => 'Recaptcha : ',
                'error_bubbling' => true,
                'label_attr' => array('class' => 'quatre'),
                'attr'        => array(
                     'options' => array(
                         'theme' => 'dark',
                         'type'  => 'image',
                )),
                
            ))
            ->add('submit','submit',array(
                'attr' => array('class' => 'btn-success'),
                'label' => 'Envoyer'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DyloProd\ResumeBundle\Entity\Contact',
        ));
    }

    public function getName()
    {
        return 'contact';
    }

}