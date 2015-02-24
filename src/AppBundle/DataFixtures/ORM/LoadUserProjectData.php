<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\UserProject;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserProjectData extends AbstractFixture implements OrderedFixtureInterface {

	/**
	 * {@inheritDoc}
	 */
	public function load(ObjectManager $manager) {

		// Invitations
		$userProject1 = new UserProject();
		$userProject2 = new UserProject();
		$userProject3 = new UserProject();
		$userProject4 = new UserProject();
		$userProject5 = new UserProject();
		$userProject6 = new UserProject();
		$userProject7 = new UserProject();

		$userProject1->setUser($this->getReference('user1'))
				->setProject($this->getReference('project9'))
				->setStatus(1);

		$userProject2->setUser($this->getReference('user2'))
				->setProject($this->getReference('project1'))
				->setStatus(1);

		$userProject3->setUser($this->getReference('user2'))
				->setProject($this->getReference('project9'))
				->setStatus(1);

		$userProject4->setUser($this->getReference('user3'))
				->setProject($this->getReference('project2'))
				->setStatus(1);

		$userProject5->setUser($this->getReference('user4'))
				->setProject($this->getReference('project3'))
				->setStatus(1);

		$userProject6->setUser($this->getReference('user5'))
				->setProject($this->getReference('project4'))
				->setStatus(1);

		$userProject7->setUser($this->getReference('user1'))
				->setProject($this->getReference('project8'))
				->setStatus(1);


		$manager->persist($userProject1);
		$manager->persist($userProject2);
		$manager->persist($userProject3);
		$manager->persist($userProject4);
		$manager->persist($userProject5);
		$manager->persist($userProject6);
		$manager->persist($userProject7);


		// Postulations
		$userProject10 = new UserProject();
		$userProject11 = new UserProject();
		$userProject12 = new UserProject();
		$userProject13 = new UserProject();
		$userProject14 = new UserProject();


		$userProject10->setUser($this->getReference('user1'))
				->setProject($this->getReference('project4'))
				->setStatus(2);

		$userProject11->setUser($this->getReference('user2'))
				->setProject($this->getReference('project6'))
				->setStatus(2);

		$userProject12->setUser($this->getReference('user3'))
				->setProject($this->getReference('project9'))
				->setStatus(2);

		$userProject13->setUser($this->getReference('user4'))
				->setProject($this->getReference('project1'))
				->setStatus(2);

		$userProject14->setUser($this->getReference('user5'))
				->setProject($this->getReference('project2'))
				->setStatus(2);

		$manager->persist($userProject10);
		$manager->persist($userProject11);
		$manager->persist($userProject12);
		$manager->persist($userProject13);		
		$manager->persist($userProject14);


		// Membres
		$userProject20 = new UserProject();
		$userProject21 = new UserProject();
		$userProject22 = new UserProject();
		$userProject23 = new UserProject();
		$userProject24 = new UserProject();
		$userProject25 = new UserProject();
		$userProject26 = new UserProject();
		$userProject27 = new UserProject();
		$userProject28 = new UserProject();
		$userProject29 = new UserProject();
		$userProject30 = new UserProject();
		$userProject31 = new UserProject();
		$userProject32 = new UserProject();
		$userProject33 = new UserProject();
		$userProject34 = new UserProject();
		$userProject35 = new UserProject();
		$userProject36 = new UserProject();
		$userProject37 = new UserProject();
		$userProject38 = new UserProject();
		$userProject39 = new UserProject();

		$userProject20->setUser($this->getReference('user1'))
				->setProject($this->getReference('project2'))
				->setStatus(3);

		$userProject21->setUser($this->getReference('user1'))
				->setProject($this->getReference('project3'))
				->setStatus(3);

		$userProject22->setUser($this->getReference('user2'))
				->setProject($this->getReference('project3'))
				->setStatus(3);

		$userProject23->setUser($this->getReference('user2'))
				->setProject($this->getReference('project4'))
				->setStatus(3);

		$userProject24->setUser($this->getReference('user2'))
				->setProject($this->getReference('project5'))
				->setStatus(3);

		$userProject25->setUser($this->getReference('user3'))
				->setProject($this->getReference('project4'))
				->setStatus(3);

		$userProject26->setUser($this->getReference('user3'))
				->setProject($this->getReference('project5'))
				->setStatus(3);

		$userProject27->setUser($this->getReference('user3'))
				->setProject($this->getReference('project6'))
				->setStatus(3);

		$userProject28->setUser($this->getReference('user3'))
				->setProject($this->getReference('project7'))
				->setStatus(3);

		$userProject29->setUser($this->getReference('user4'))
				->setProject($this->getReference('project5'))
				->setStatus(3);

		$userProject30->setUser($this->getReference('user4'))
				->setProject($this->getReference('project6'))
				->setStatus(3);

		$userProject31->setUser($this->getReference('user4'))
				->setProject($this->getReference('project7'))
				->setStatus(3);
		
		$userProject32->setUser($this->getReference('user4'))
				->setProject($this->getReference('project8'))
				->setStatus(3);

		$userProject33->setUser($this->getReference('user4'))
				->setProject($this->getReference('project9'))
				->setStatus(3);
		
		$userProject34->setUser($this->getReference('user5'))
				->setProject($this->getReference('project6'))
				->setStatus(3);

		$userProject35->setUser($this->getReference('user5'))
				->setProject($this->getReference('project7'))
				->setStatus(3);
		
		$userProject36->setUser($this->getReference('user5'))
				->setProject($this->getReference('project8'))
				->setStatus(3);

		$userProject37->setUser($this->getReference('user5'))
				->setProject($this->getReference('project9'))
				->setStatus(3);
		
		$userProject38->setUser($this->getReference('user5'))
				->setProject($this->getReference('project1'))
				->setStatus(3);

		$userProject39->setUser($this->getReference('user5'))
				->setProject($this->getReference('project2'))
				->setStatus(3);

		$manager->persist($userProject20);
		$manager->persist($userProject21);
		$manager->persist($userProject22);
		$manager->persist($userProject23);
		$manager->persist($userProject24);
		$manager->persist($userProject25);
		$manager->persist($userProject26);
		$manager->persist($userProject27);
		$manager->persist($userProject28);
		$manager->persist($userProject29);
		$manager->persist($userProject30);
		$manager->persist($userProject31);
		$manager->persist($userProject32);
		$manager->persist($userProject33);
		$manager->persist($userProject34);
		$manager->persist($userProject35);
		$manager->persist($userProject36);
		$manager->persist($userProject37);
		$manager->persist($userProject38);
		$manager->persist($userProject39);

		$manager->flush();
	}

	public function getOrder() {
		return 9;
	}

}
