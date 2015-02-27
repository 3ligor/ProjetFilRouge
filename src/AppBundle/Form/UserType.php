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
		$builder->add('pseudo','hidden')
				->add('firstname','hidden')
				->add('lastname','hidden')
				->add('birthdate','hidden')
				->add('publicMail','hidden')
				->add('publicMail','hidden')
				->add('publicCity','hidden')
				->add('publicTel','hidden')
				->add('publicBirthdate','hidden')
				->add('password','hidden')
				->add('active','hidden')
				->add('available','hidden')
				->add('image','hidden')
				->add('userSkills','hidden')
				->add('userProjects','hidden')
				->add('salt','hidden')
				->add('roles','hidden')
				->add('city', 'text')
				->add('email', 'text')
				->add('tel', 'text')
				->add('promo','entity', array(
                    'class'=>'AppBundle:Promo',
                    'property'=>'title', 
					'multiple'=>'true',
                   ))
				->add('Modifier','submit');
				
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
