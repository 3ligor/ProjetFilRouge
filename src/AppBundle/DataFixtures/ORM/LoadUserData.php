<?php

namespace AppBundle\DataFixtures\ORM;

use BlogBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {

	$user1 = new Project();
	$user1->setPseudo('Shru')
		->setFirstname('Julien')
		->setLastname('Sanselme')
		->setBirthdate(new \DateTime())
		->setTel('0605040302')
		->setEmail('julien.sanselme@gmail.com')
		->setCity('Nantes')
		->setPublicMail(true)
		->setPublicCity(true)
		->setPublicTel(true)
		->setPublicBirthdate(true)
		->setPassword('1234')
		->setActive(true)
		->setAvailable(true)
		->addProjects($this->getReference('project1'))
		->addLeadProjects($this->getReference('project2'))
		->addPromo($this->getReference('promo1'))
		->setImage($this->getReference('image1'));
	
	$user2 = new Project();
	$user2->setPseudo('Eligor')
		->setFirstname('Alexandre')
		->setLastname('Defebvre')
		->setBirthdate(new \DateTime())
		->setTel('0602030405')
		->setEmail('alexandre.defebvre@gmail.com')
		->setCity('Nantes')
		->setPublicMail(false)
		->setPublicCity(true)
		->setPublicTel(false)
		->setPublicBirthdate(true)
		->setPassword('1234')
		->setActive(true)
		->setAvailable(false)
		->addProjects($this->getReference('project2'))
		->addLeadProjects($this->getReference('project3'))
		->addPromo($this->getReference('promo2'))
		->setImage($this->getReference('image2'));

	$user3 = new Project();
	$user3->setPseudo('Miss XXII')
		->setFirstname('Mickaël')
		->setLastname('Broussard')
		->setBirthdate(new \DateTime())
		->setTel('0602020202')
		->setEmail('mickael.broussard@gmail.com')
		->setCity('Rezé')
		->setPublicMail(false)
		->setPublicCity(false)
		->setPublicTel(false)
		->setPublicBirthdate(false)
		->setPassword('1234')
		->setActive(false)
		->setAvailable(true)
		->addProjects($this->getReference('project3'))
		->addLeadProjects($this->getReference('project4'))
		->addPromo($this->getReference('promo3'))
		->setImage($this->getReference('image3'));
	
	$user4 = new Project();
	$user4->setPseudo('Dirty')
		->setFirstname('Lynsie')
		->setLastname("N'guyen")
		->setBirthdate(new \DateTime())
		->setTel('0603030303')
		->setEmail("lynsie.nguyen@gmail.com")
		->setCity('Bouguenais')
		->setPublicMail(true)
		->setPublicCity(false)
		->setPublicTel(true)
		->setPublicBirthdate(false)
		->setPassword('1234')
		->setActive(false)
		->setAvailable(false)
		->addProjects($this->getReference('project4'))
		->addLeadProjects($this->getReference('project5'))
		->addPromo($this->getReference('promo1'))
		->setImage($this->getReference('image4'));

	$user5 = new Project();
	$user5->setPseudo('Tag')
		->setFirstname('Jeremy')
		->setLastname('Cheron')
		->setBirthdate(new \DateTime())
		->setTel('0601010101')
		->setEmail('jeremy.cheron@gmail.com')
		->setCity('Paris')
		->setPublicMail(false)
		->setPublicCity(false)
		->setPublicTel(true)
		->setPublicBirthdate(true)
		->setPassword('1234')
		->setActive(true)
		->setAvailable(false)
		->addProjects($this->getReference('project5'))
		->addLeadProjects($this->getReference('project6'))
		->addPromo($this->getReference('promo2'))
		->setImage($this->getReference('image5'));

	
	$manager->persist($project1);
	$manager->persist($project2);
	$manager->persist($project3);
	$manager->persist($project4);
	$manager->persist($project5);
	
	$manager->flush();

	$this->addReference('project1', $project1);
	$this->addReference('project2', $project2);
	$this->addReference('project3', $project3);
	$this->addReference('project4', $project4);
	$this->addReference('project5', $project5);
	
    }

    public function getOrder() {
	return 7;
    }

}
