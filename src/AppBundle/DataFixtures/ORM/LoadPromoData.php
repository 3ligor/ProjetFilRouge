<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Promo;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPromoData extends AbstractFixture implements OrderedFixtureInterface {

	/**
	 * {@inheritDoc}
	 */
	public function load(ObjectManager $manager) {

		$promo1 = new Promo();
		$promo1->setTitle('NANTES-DL10');

		$promo2 = new Promo();
		$promo2->setTitle('NANTES-TSRIT8');

		$promo3 = new Promo();
		$promo3->setTitle('NANTES-T2SI12');

		$promo4 = new Promo();
		$promo4->setTitle('RENNES-CDI9');

		$promo5 = new Promo();
		$promo5->setTitle('NANTES-CDPN10');

		$manager->persist($promo1);
		$manager->persist($promo2);
		$manager->persist($promo3);
		$manager->persist($promo4);
		$manager->persist($promo5);

		$manager->flush();

		$this->addReference('promo1', $promo1);
		$this->addReference('promo2', $promo2);
		$this->addReference('promo3', $promo3);
		$this->addReference('promo4', $promo4);
		$this->addReference('promo5', $promo5);
	}

	public function getOrder() {
		return 3;
	}

}
