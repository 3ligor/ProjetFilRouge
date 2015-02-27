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
		$builder->add('user', 'entity', array(
					'class' => 'AppBundle:User'
				))
				->add('status', 'choice', array(
					'choices' => array(
						'4' => 'Chef de projet',
						'3' => 'Membre',
						'2' => 'Candidat',
						'1' => 'Invité',
						'0' => 'Supprimer'
					)
		));
	}

	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\UserProject'
		));
	}

	/**
	 * @return string
	 */
	public function getName() {
		return 'appbundle_invite';
	}

}
