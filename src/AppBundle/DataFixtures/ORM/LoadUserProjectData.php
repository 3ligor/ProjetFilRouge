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
				->setStatus(1);

		$userProject2->setUser($this->getReference('user2'))
				->setStatus(1);

		$userProject3->setUser($this->getReference('user2'))
				->setStatus(1);

		$userProject4->setUser($this->getReference('user3'))
				->setStatus(1);

		$userProject5->setUser($this->getReference('user4'))
				->setStatus(1);

		$userProject6->setUser($this->getReference('user5'))
				->setStatus(1);

		$userProject7->setUser($this->getReference('user1'))
				->setStatus(1);

		// Postulations
		$userProject10 = new UserProject();
		$userProject11 = new UserProject();
		$userProject12 = new UserProject();
		$userProject13 = new UserProject();
		$userProject14 = new UserProject();


		$userProject10->setUser($this->getReference('user1'))
				->setStatus(2);

		$userProject11->setUser($this->getReference('user2'))
				->setStatus(2);

		$userProject12->setUser($this->getReference('user3'))
				->setStatus(2);

		$userProject13->setUser($this->getReference('user4'))
				->setStatus(2);

		$userProject14->setUser($this->getReference('user5'))
				->setStatus(2);

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
//		$userProject33 = new UserProject();
		$userProject34 = new UserProject();
		$userProject35 = new UserProject();
		$userProject36 = new UserProject();
		$userProject37 = new UserProject();
		$userProject38 = new UserProject();
		$userProject39 = new UserProject();

		$userProject20->setUser($this->getReference('user1'))
				->setStatus(3);

		$userProject21->setUser($this->getReference('user1'))
				->setStatus(3);

		$userProject22->setUser($this->getReference('user2'))
				->setStatus(3);

		$userProject23->setUser($this->getReference('user2'))
				->setStatus(3);

		$userProject24->setUser($this->getReference('user2'))
				->setStatus(3);

		$userProject25->setUser($this->getReference('user3'))
				->setStatus(3);

		$userProject26->setUser($this->getReference('user3'))
				->setStatus(3);

		$userProject27->setUser($this->getReference('user3'))
				->setStatus(3);

		$userProject28->setUser($this->getReference('user3'))
				->setStatus(3);

		$userProject29->setUser($this->getReference('user1'))
				->setStatus(3);

		$userProject30->setUser($this->getReference('user4'))
				->setStatus(3);

		$userProject31->setUser($this->getReference('user4'))
				->setStatus(3);

		$userProject32->setUser($this->getReference('user4'))
				->setStatus(3);

//		$userProject33->setUser($this->getReference('user4'))
//				->setStatus(3);

		$userProject34->setUser($this->getReference('user5'))
				->setStatus(3);

		$userProject35->setUser($this->getReference('user5'))
				->setStatus(3);

		$userProject36->setUser($this->getReference('user5'))
				->setStatus(3);

		$userProject37->setUser($this->getReference('user5'))
				->setStatus(3);

		$userProject38->setUser($this->getReference('user5'))
				->setStatus(3);

		$userProject39->setUser($this->getReference('user5'))
				->setStatus(3);

		// Leader
		$userProject40 = new UserProject();
		$userProject41 = new UserProject();
		$userProject42 = new UserProject();
		$userProject43 = new UserProject();
		$userProject44 = new UserProject();
		$userProject45 = new UserProject();
		$userProject46 = new UserProject();
		$userProject47 = new UserProject();
		$userProject48 = new UserProject();
		$userProject49 = new UserProject();

		$userProject40->setUser($this->getReference('user1'))
				->setStatus(4);
		$userProject41->setUser($this->getReference('user2'))
				->setStatus(4);
		$userProject42->setUser($this->getReference('user3'))
				->setStatus(4);
		$userProject43->setUser($this->getReference('user4'))
				->setStatus(4);
		$userProject44->setUser($this->getReference('user4'))
				->setStatus(4);
		$userProject45->setUser($this->getReference('user1'))
				->setStatus(4);
		$userProject46->setUser($this->getReference('user2'))
				->setStatus(4);
		$userProject47->setUser($this->getReference('user3'))
				->setStatus(4);
		$userProject48->setUser($this->getReference('user4'))
				->setStatus(4);
		$userProject49->setUser($this->getReference('user3'))
				->setStatus(4);

		$manager->persist($userProject1);
		$manager->persist($userProject2);
		$manager->persist($userProject3);
		$manager->persist($userProject4);
		$manager->persist($userProject5);
		$manager->persist($userProject6);
		$manager->persist($userProject7);
		$manager->persist($userProject10);
		$manager->persist($userProject11);
		$manager->persist($userProject12);
		$manager->persist($userProject13);
		$manager->persist($userProject14);
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
//		$manager->persist($userProject33);
		$manager->persist($userProject34);
		$manager->persist($userProject35);
		$manager->persist($userProject36);
		$manager->persist($userProject37);
		$manager->persist($userProject38);
		$manager->persist($userProject39);
		$manager->persist($userProject40);
		$manager->persist($userProject41);
		$manager->persist($userProject42);
		$manager->persist($userProject43);
		$manager->persist($userProject44);
		$manager->persist($userProject45);
		$manager->persist($userProject46);
		$manager->persist($userProject47);
		$manager->persist($userProject48);
		$manager->persist($userProject49);
		
		$manager->flush();

		
		$this->addReference('userProject1', $userProject1);
		$this->addReference('userProject2', $userProject2);
		$this->addReference('userProject3', $userProject3);
		$this->addReference('userProject4', $userProject4);
		$this->addReference('userProject5', $userProject5);
		$this->addReference('userProject6', $userProject6);
		$this->addReference('userProject7', $userProject7);
		$this->addReference('userProject10', $userProject10);
		$this->addReference('userProject11', $userProject11);
		$this->addReference('userProject12', $userProject12);
		$this->addReference('userProject13', $userProject13);
		$this->addReference('userProject14', $userProject14);
		$this->addReference('userProject20', $userProject20);
		$this->addReference('userProject21', $userProject21);
		$this->addReference('userProject22', $userProject22);
		$this->addReference('userProject23', $userProject23);
		$this->addReference('userProject24', $userProject24);
		$this->addReference('userProject25', $userProject25);
		$this->addReference('userProject26', $userProject26);
		$this->addReference('userProject27', $userProject37);
		$this->addReference('userProject28', $userProject28);
		$this->addReference('userProject29', $userProject29);
		$this->addReference('userProject30', $userProject30);
		$this->addReference('userProject31', $userProject31);
		$this->addReference('userProject32', $userProject32);
//		$this->addReference('userProject33', $userProject33);
		$this->addReference('userProject34', $userProject34);
		$this->addReference('userProject35', $userProject35);
		$this->addReference('userProject36', $userProject36);
		$this->addReference('userProject37', $userProject37);
		$this->addReference('userProject38', $userProject38);
		$this->addReference('userProject39', $userProject39);
		$this->addReference('userProject40', $userProject40);
		$this->addReference('userProject41', $userProject41);
		$this->addReference('userProject42', $userProject42);
		$this->addReference('userProject43', $userProject43);
		$this->addReference('userProject44', $userProject44);
		$this->addReference('userProject45', $userProject45);
		$this->addReference('userProject46', $userProject46);
		$this->addReference('userProject47', $userProject47);
		$this->addReference('userProject48', $userProject48);
		$this->addReference('userProject49', $userProject49);

	}

	public function getOrder() {
		return 8;
	}

}
