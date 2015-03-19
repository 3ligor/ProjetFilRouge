<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType {

	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		
			$builder->add('pseudo', 'text')
					->add('publicMail', 'checkbox', array(
				 'label'     => 'Afficher publiquement ?',
				 'required'  => false,
				))
				->add('publicCity', 'checkbox', array(
				 'label'     => 'Afficher publiquement ?',
				 'required'  => false,
				))
				->add('publicTel', 'checkbox', array(
				 'label'     => 'Afficher publiquement ?',
				 'required'  => false,
				))
				->add('publicBirthdate', 'checkbox', array(
				 'label'     => 'Afficher publiquement ?',
				 'required'  => false,
				))
				->add('available', 'choice', array(
					'choices'   => array(
						'1'   => 'Oui',
						'0' => 'Non',
				 ),
				))
				->add('city', 'text')
				->add('email', 'text')
				->add('tel', 'text')
				->add('promo','entity', array(
                    'class'=>'AppBundle:Promo',
                    'property'=>'title', 
					'multiple'=>'true',
                ))
				->add('Modifier','submit',array(
					'attr' => array('class' => 'btn btn-primary btn-xs col-xs-12')));	
	}

	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\User'
		));
	}

	/**
	 * @return string
	 */
	public function getName() {
		return 'appbundle_user';
	}

}
