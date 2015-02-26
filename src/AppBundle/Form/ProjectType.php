<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProjectType extends AbstractType {

	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('title', 'text')
				->add('smallDescription', 'textarea', array(
					'attr' => array(
						'rows' => 3,
					)
				))
				->add('longDescription', 'textarea', array(
					'attr' => array(
						'rows' => 15,
					)
				))
				->add('maxMembers', 'integer')
				->add('categories', 'entity', array(
					'class' => 'AppBundle:Category',
					'property' => 'title',
					'multiple' => true
				))
				->add('stages', 'collection', array(
					'type' => new StageType(),
					'allow_add' => true,
					'allow_delete' => true,
					'by_reference' => false
				))
				->add('userProjects', 'collection', array(
					'type' => new InviteType(),
					'allow_add' => true,
					'allow_delete' => true,
					'by_reference' => false
				))
				->add('startDate', 'date', array(
					'years' => range(date('Y') - 1, date('Y') + 50),
				))
				->add('endDate', 'date', array(
					'years' => range(date('Y') - 1, date('Y') + 50)
				))
				->add('Brouillon', 'submit')
				->add('Valider', 'submit');
	}

	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\Project'
		));
	}

	/**
	 * @return string
	 */
	public function getName() {
		return 'appbundle_project';
	}

}
