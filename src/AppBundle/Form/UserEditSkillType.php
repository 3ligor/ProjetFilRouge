<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserEditSkillType extends AbstractType {

	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('userSkills', 'collection', array (
				'type' => new UserSkillType(),
				'allow_add'=> true,
				'allow_delete'=> true,
				'by_reference' => false
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
