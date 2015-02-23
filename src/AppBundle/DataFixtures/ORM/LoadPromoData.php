<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
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
		->addPromo($this->getReference('promo2'))
		->setImage($this->getReference('image5'));

	
	$manager->persist($user1);
	$manager->persist($user2);
	$manager->persist($user3);
	$manager->persist($user4);
	$manager->persist($user5);
	
	$manager->flush();

	$this->addReference('user1', $user1);
	$this->addReference('user2', $user2);
	$this->addReference('user3', $user3);
	$this->addReference('user4', $user4);
	$this->addReference('user5', $user5);
	
    }

    public function getOrder() {
	return 6;
    }

}
