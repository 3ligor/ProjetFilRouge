<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InviteType extends AbstractType {

	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('user', 'text')
				->add('volume', 'integer')
				->add('status', 'checkbox', array(
					'label' => 'Étape terminée',
					'required'  => false,
				));
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
		return 'appbundle_invite';
	}

}
