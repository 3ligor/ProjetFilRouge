<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Skill;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadSkillData extends AbstractFixture implements OrderedFixtureInterface {

	/**
	 * {@inheritDoc}
	 */
	public function load(ObjectManager $manager) {

		$skill1 = new Skill();
		$skill2 = new Skill();
		$skill3 = new Skill();
		$skill4 = new Skill();
		$skill5 = new Skill();
		$skill6 = new Skill();
		$skill7 = new Skill();
		$skill8 = new Skill();

		$skill1->setTitle('PHP');
		$skill2->setTitle('JavaScript');
		$skill3->setTitle('HTML - CSS');
		$skill4->setTitle('Java');
		$skill5->setTitle('C++');
		$skill6->setTitle('Symfony 2')
				->setParent($skill1);
		$skill7->setTitle('Bootstrap')
				->setParent($skill3);
		$skill8->setTitle('J2EE')
				->setParent($skill4);

		$manager->persist($skill1);
		$manager->persist($skill2);
		$manager->persist($skill3);
		$manager->persist($skill4);
		$manager->persist($skill5);
		$manager->persist($skill6);
		$manager->persist($skill7);
		$manager->persist($skill8);

		
		$manager->flush();

		$this->addReference('skill1', $skill1);
		$this->addReference('skill2', $skill2);
		$this->addReference('skill3', $skill3);
		$this->addReference('skill4', $skill4);
		$this->addReference('skill5', $skill5);
		$this->addReference('skill6', $skill6);
		$this->addReference('skill7', $skill7);
		$this->addReference('skill8', $skill8);
	}

	public function getOrder() {
		return 6;
	}

}
