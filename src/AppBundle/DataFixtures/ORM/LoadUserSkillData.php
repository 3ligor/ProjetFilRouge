<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\UserSkill;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserSkillData extends AbstractFixture implements OrderedFixtureInterface {

	/**
	 * {@inheritDoc}
	 */
	public function load(ObjectManager $manager) {

		$userSkill1 = new UserSkill();
		$userSkill2 = new UserSkill();
		$userSkill3 = new UserSkill();
		$userSkill4 = new UserSkill();
		$userSkill5 = new UserSkill();

		$userSkill1->setValue('5')
				->setSkill($this->getReference('skill1'))
				->setUser($this->getReference('user1'));
		$userSkill2->setValue('4')
				->setSkill($this->getReference('skill2'))
				->setUser($this->getReference('user1'));
		$userSkill3->setValue('4')
				->setSkill($this->getReference('skill1'))
				->setUser($this->getReference('user2'));
		$userSkill4->setValue('3')
				->setSkill($this->getReference('skill3'))
				->setUser($this->getReference('user3'));
		$userSkill5->setValue('2')
				->setSkill($this->getReference('skill8'))
				->setUser($this->getReference('user4'));

		$manager->persist($userSkill1);
		$manager->persist($userSkill2);
		$manager->persist($userSkill3);
		$manager->persist($userSkill4);
		$manager->persist($userSkill5);

		$manager->flush();

		$this->addReference('userSkill1', $userSkill1);
		$this->addReference('userSkill2', $userSkill2);
		$this->addReference('userSkill3', $userSkill3);
		$this->addReference('userSkill4', $userSkill4);
		$this->addReference('userSkill5', $userSkill5);
	}

	public function getOrder() {
		return 7;
	}

}
