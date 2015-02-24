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
                $userSkill6 = new UserSkill();
                $userSkill7 = new UserSkill();
                $userSkill8 = new UserSkill();
                $userSkill9 = new UserSkill();
                $userSkill10 = new UserSkill();
                $userSkill11 = new UserSkill();
                $userSkill12 = new UserSkill();
                $userSkill13 = new UserSkill();
                $userSkill14 = new UserSkill();
                $userSkill15 = new UserSkill();
                $userSkill16 = new UserSkill();
                $userSkill17 = new UserSkill();
                $userSkill18 = new UserSkill();
                $userSkill19 = new UserSkill();
                $userSkill20 = new UserSkill();

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
                
                $userSkill6->setValue('3')
				->setSkill($this->getReference('skill13'))
				->setUser($this->getReference('user1'));
                
                $userSkill7->setValue('3')
				->setSkill($this->getReference('skill11'))
				->setUser($this->getReference('user1'));
                $userSkill8->setValue('2')
				->setSkill($this->getReference('skill15'))
				->setUser($this->getReference('user1'));
                $userSkill9->setValue('4')
				->setSkill($this->getReference('skill17'))
				->setUser($this->getReference('user1'));
                
                $userSkill10->setValue('4')
				->setSkill($this->getReference('skill21'))
				->setUser($this->getReference('user2'));
                $userSkill11->setValue('4')
				->setSkill($this->getReference('skill20'))
				->setUser($this->getReference('user2'));
                $userSkill12->setValue('4')
				->setSkill($this->getReference('skill23'))
				->setUser($this->getReference('user2'));
                $userSkill13->setValue('4')
				->setSkill($this->getReference('skill16'))
				->setUser($this->getReference('user2'));
                
                $userSkill14->setValue('3')
				->setSkill($this->getReference('skill9'))
				->setUser($this->getReference('user3'));
                $userSkill15->setValue('3')
				->setSkill($this->getReference('skill10'))
				->setUser($this->getReference('user3'));
                $userSkill16->setValue('3')
				->setSkill($this->getReference('skill13'))
				->setUser($this->getReference('user3'));
                
                $userSkill17->setValue('3')
				->setSkill($this->getReference('skill13'))
				->setUser($this->getReference('user4'));
                $userSkill18->setValue('3')
				->setSkill($this->getReference('skill21'))
				->setUser($this->getReference('user4'));
                $userSkill19->setValue('3')
				->setSkill($this->getReference('skill5'))
				->setUser($this->getReference('user4'));
                $userSkill20->setValue('3')
				->setSkill($this->getReference('skill7'))
				->setUser($this->getReference('user4'));
                
                
                
		$manager->persist($userSkill1);
		$manager->persist($userSkill2);
		$manager->persist($userSkill3);
		$manager->persist($userSkill4);
		$manager->persist($userSkill5);
                $manager->persist($userSkill6);
                $manager->persist($userSkill7);
                $manager->persist($userSkill8);
                $manager->persist($userSkill9);
                $manager->persist($userSkill10);
                $manager->persist($userSkill11);
                $manager->persist($userSkill12);
                $manager->persist($userSkill13);
                $manager->persist($userSkill14);
                $manager->persist($userSkill15);
                $manager->persist($userSkill16);
                $manager->persist($userSkill17);
                $manager->persist($userSkill18);
                $manager->persist($userSkill19);
                $manager->persist($userSkill20);
              

		$manager->flush();
	}

	public function getOrder() {
		return 7;
	}

}
