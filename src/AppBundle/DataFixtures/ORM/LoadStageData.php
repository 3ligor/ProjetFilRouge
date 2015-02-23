<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Stage;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadStageData extends AbstractFixture implements OrderedFixtureInterface {

	/**
	 * {@inheritDoc}
	 */
	public function load(ObjectManager $manager) {

		// Stage for project 1
		$stage11 = new Stage();
		$stage11->setTitle('Etape 1')
				->setVolume('30');

		$stage12 = new Stage();
		$stage12->setTitle('Etape 2')
				->setVolume('10');

		$stage13 = new Stage();
		$stage13->setTitle('Etape 3')
				->setVolume('45');

		$stage14 = new Stage();
		$stage14->setTitle('Etape 4')
				->setVolume('15');

		
		// Stage for project 2
		$stage21 = new Stage();
		$stage21->setTitle('Etape 1')
				->setVolume('10');

		$stage22 = new Stage();
		$stage22->setTitle('Etape 2')
				->setVolume('25');

		$stage23 = new Stage();
		$stage23->setTitle('Etape 3')
				->setVolume('25');

		$stage24 = new Stage();
		$stage24->setTitle('Etape 4')
				->setVolume('30');

		$stage25 = new Stage();
		$stage25->setTitle('Etape 5')
				->setVolume('10');

		
		//Stage for project 3
		$stage31 = new Stage();
		$stage31->setTitle('Etape 1')
				->setVolume('15');

		$stage32 = new Stage();
		$stage32->setTitle('Etape 2')
				->setVolume('15');

		$stage33 = new Stage();
		$stage33->setTitle('Etape 3')
				->setVolume('15');

		$stage34 = new Stage();
		$stage34->setTitle('Etape 4')
				->setVolume('15');

		$stage35 = new Stage();
		$stage35->setTitle('Etape 5')
				->setVolume('25');

		$stage36 = new Stage();
		$stage36->setTitle('Etape 6')
				->setVolume('10');

		$stage37 = new Stage();
		$stage37->setTitle('Etape 7')
				->setVolume('5');

		
		// Stage for project 4
		$stage41 = new Stage();
		$stage41->setTitle('Etape 1')
				->setVolume('5');

		$stage42 = new Stage();
		$stage42->setTitle('Etape 2')
				->setVolume('55');

		$stage43 = new Stage();
		$stage43->setTitle('Etape 3')
				->setVolume('25');

		$stage44 = new Stage();
		$stage44->setTitle('Etape 4')
				->setVolume('15');

		
		// Stage for project 5
		$stage51 = new Stage();
		$stage51->setTitle('Etape 1')
				->setVolume('15');

		$stage52 = new Stage();
		$stage52->setTitle('Etape 2')
				->setVolume('15');

		$stage53 = new Stage();
		$stage53->setTitle('Etape 3')
				->setVolume('35');

		$stage54 = new Stage();
		$stage54->setTitle('Etape 4')
				->setVolume('25');

		$stage55 = new Stage();
		$stage55->setTitle('Etape 5')
				->setVolume('5');

		$stage56 = new Stage();
		$stage56->setTitle('Etape 6')
				->setVolume('5');

		
		// Stage for project 6
		$stage61 = new Stage();
		$stage61->setTitle('Etape 1')
				->setVolume('5');

		$stage62 = new Stage();
		$stage62->setTitle('Etape 2')
				->setVolume('5');

		$stage63 = new Stage();
		$stage63->setTitle('Etape 3')
				->setVolume('10');

		$stage64 = new Stage();
		$stage64->setTitle('Etape 4')
				->setVolume('5');

		$stage65 = new Stage();
		$stage65->setTitle('Etape 5')
				->setVolume('35');

		$stage66 = new Stage();
		$stage66->setTitle('Etape 6')
				->setVolume('15');

		$stage67 = new Stage();
		$stage67->setTitle('Etape 7')
				->setVolume('15');

		$stage68 = new Stage();
		$stage68->setTitle('Etape 8')
				->setVolume('5');

		$stage69 = new Stage();
		$stage69->setTitle('Etape 9')
				->setVolume('5');

		
		// Stage for project 7
		$stage71 = new Stage();
		$stage71->setTitle('Etape 1')
				->setVolume('20');

		$stage72 = new Stage();
		$stage72->setTitle('Etape 2')
				->setVolume('20');

		$stage73 = new Stage();
		$stage73->setTitle('Etape 3')
				->setVolume('40');

		$stage74 = new Stage();
		$stage74->setTitle('Etape 4')
				->setVolume('20');

		
		// Stage fpr project 8
		$stage81 = new Stage();
		$stage81->setTitle('Etape 1')
				->setVolume('20');

		$stage82 = new Stage();
		$stage82->setTitle('Etape 2')
				->setVolume('60');

		$stage83 = new Stage();
		$stage83->setTitle('Etape 3')
				->setVolume('10');

		$stage84 = new Stage();
		$stage84->setTitle('Etape 4')
				->setVolume('10');

		
		// Stage for project 9
		$stage91 = new Stage();
		$stage91->setTitle('Etape 1')
				->setVolume('10');

		$stage92 = new Stage();
		$stage92->setTitle('Etape 2')
				->setVolume('15');

		$stage93 = new Stage();
		$stage93->setTitle('Etape 3')
				->setVolume('40');

		$stage94 = new Stage();
		$stage94->setTitle('Etape 4')
				->setVolume('20');

		$stage95 = new Stage();
		$stage95->setTitle('Etape 5')
				->setVolume('15');

		$manager->persist($stage11);
		$manager->persist($stage12);
		$manager->persist($stage13);
		$manager->persist($stage14);

		$manager->persist($stage21);
		$manager->persist($stage22);
		$manager->persist($stage23);
		$manager->persist($stage24);
		$manager->persist($stage25);

		$manager->persist($stage31);
		$manager->persist($stage32);
		$manager->persist($stage33);
		$manager->persist($stage34);
		$manager->persist($stage35);
		$manager->persist($stage36);
		$manager->persist($stage37);

		$manager->persist($stage41);
		$manager->persist($stage42);
		$manager->persist($stage43);
		$manager->persist($stage44);

		$manager->persist($stage51);
		$manager->persist($stage52);
		$manager->persist($stage53);
		$manager->persist($stage54);
		$manager->persist($stage55);
		$manager->persist($stage56);

		$manager->persist($stage61);
		$manager->persist($stage62);
		$manager->persist($stage63);
		$manager->persist($stage64);
		$manager->persist($stage65);
		$manager->persist($stage66);
		$manager->persist($stage67);
		$manager->persist($stage68);
		$manager->persist($stage69);

		$manager->persist($stage71);
		$manager->persist($stage72);
		$manager->persist($stage73);
		$manager->persist($stage74);

		$manager->persist($stage81);
		$manager->persist($stage82);
		$manager->persist($stage83);
		$manager->persist($stage84);

		$manager->persist($stage91);
		$manager->persist($stage92);
		$manager->persist($stage93);
		$manager->persist($stage94);
		$manager->persist($stage95);

		$manager->flush();

		$this->addReference('stage11', $stage11);
		$this->addReference('stage12', $stage12);
		$this->addReference('stage13', $stage13);
		$this->addReference('stage14', $stage14);

		$this->addReference('stage21', $stage21);
		$this->addReference('stage22', $stage22);
		$this->addReference('stage23', $stage23);
		$this->addReference('stage24', $stage24);
		$this->addReference('stage25', $stage25);

		$this->addReference('stage31', $stage31);
		$this->addReference('stage32', $stage32);
		$this->addReference('stage33', $stage33);
		$this->addReference('stage34', $stage34);
		$this->addReference('stage35', $stage35);
		$this->addReference('stage36', $stage36);
		$this->addReference('stage37', $stage37);

		$this->addReference('stage41', $stage41);
		$this->addReference('stage42', $stage42);
		$this->addReference('stage43', $stage43);
		$this->addReference('stage44', $stage44);

		$this->addReference('stage51', $stage51);
		$this->addReference('stage52', $stage52);
		$this->addReference('stage53', $stage53);
		$this->addReference('stage54', $stage54);
		$this->addReference('stage55', $stage55);
		$this->addReference('stage56', $stage56);

		$this->addReference('stage61', $stage61);
		$this->addReference('stage62', $stage62);
		$this->addReference('stage63', $stage63);
		$this->addReference('stage64', $stage64);
		$this->addReference('stage65', $stage65);
		$this->addReference('stage66', $stage66);
		$this->addReference('stage67', $stage67);
		$this->addReference('stage68', $stage68);
		$this->addReference('stage69', $stage69);

		$this->addReference('stage71', $stage71);
		$this->addReference('stage72', $stage72);
		$this->addReference('stage73', $stage73);
		$this->addReference('stage74', $stage74);

		$this->addReference('stage81', $stage81);
		$this->addReference('stage82', $stage82);
		$this->addReference('stage83', $stage83);
		$this->addReference('stage84', $stage84);

		$this->addReference('stage91', $stage91);
		$this->addReference('stage92', $stage92);
		$this->addReference('stage93', $stage93);
		$this->addReference('stage94', $stage94);
		$this->addReference('stage95', $stage95);
	}

	public function getOrder() {
		return 1;
	}

}
