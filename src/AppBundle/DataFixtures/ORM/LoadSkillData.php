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
                $skill9 = new Skill();
                $skill10 = new Skill();
                $skill11 = new Skill();
                $skill12 = new Skill();
                $skill13 = new Skill();
                $skill14 = new Skill();
                $skill15 = new Skill();
                $skill16 = new Skill();
                $skill17 = new Skill();
                $skill18 = new Skill();
                $skill19 = new Skill();
                $skill20 = new Skill();
                $skill21 = new Skill();
                $skill22 = new Skill();
                $skill23 = new Skill();
                $skill24 = new Skill();
                $skill25 = new Skill();
                $skill26 = new Skill();
                
                

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
                
                $skill9->setTitle('Photoshop CS6')
                         ->setParent($skill25);
                $skill10->setTitle('Indesign')
                        ->setParent($skill25);
                $skill11->setTitle('Wordpress')
                         ->setParent($skill12);
                $skill12->setTitle('CMS');
                $skill13->setTitle('Joomla')
                        ->setParent($skill12);
                $skill14->setTitle('Methode Agile')
                        ->setParent($skill26);
                $skill15->setTitle('Model MVC')
                         ->setParent($skill12);
                $skill16->setTitle('Prestashop')
                        ->setParent($skill12);
                $skill17->setTitle('PhoneGap')
                        ->setParent($skill1);
                $skill18->setTitle('WebMarketing');
                $skill19->setTitle('Référencement');
                $skill20->setTitle('SEA')
                         ->setParent($skill19);
                $skill21->setTitle('SEO')
                         ->setParent($skill19);
                $skill22->setTitle('E-mailing')
                         ->setParent($skill23);
                $skill23->setTitle('Communication');
                $skill24->setTitle('Facebook')
                        ->setParent($skill23);
                $skill25->setTitle('Webdesign');
                $skill26->setTitle('Methode');
                
                
                
		$manager->persist($skill1);
		$manager->persist($skill2);
		$manager->persist($skill3);
		$manager->persist($skill4);
		$manager->persist($skill5);
		$manager->persist($skill6);
		$manager->persist($skill7);
		$manager->persist($skill8);
                $manager->persist($skill9);
                $manager->persist($skill10);
                $manager->persist($skill11);
                $manager->persist($skill12);
                $manager->persist($skill13);
                $manager->persist($skill14);
                $manager->persist($skill15);
                $manager->persist($skill16);
                $manager->persist($skill17);
                $manager->persist($skill18);
                $manager->persist($skill19);
                $manager->persist($skill20);
                $manager->persist($skill21);
                $manager->persist($skill22);
                $manager->persist($skill23);
                $manager->persist($skill24);
                $manager->persist($skill25);
                $manager->persist($skill26);

		$manager->flush();

		$this->addReference('skill1', $skill1);
		$this->addReference('skill2', $skill2);
		$this->addReference('skill3', $skill3);
		$this->addReference('skill4', $skill4);
		$this->addReference('skill5', $skill5);
		$this->addReference('skill6', $skill6);
		$this->addReference('skill7', $skill7);
		$this->addReference('skill8', $skill8);
                $this->addReference('skill9', $skill9);
                $this->addReference('skill10', $skill10);
                $this->addReference('skill11', $skill11);
                $this->addReference('skill12', $skill12);
                $this->addReference('skill13', $skill13);
                $this->addReference('skill14', $skill14);
                $this->addReference('skill15', $skill15);
                $this->addReference('skill16', $skill16);
                $this->addReference('skill17', $skill17);
                $this->addReference('skill18', $skill18);
                $this->addReference('skill19', $skill19);
                $this->addReference('skill20', $skill20);
                $this->addReference('skill21', $skill21);
                $this->addReference('skill22', $skill22);
                $this->addReference('skill23', $skill23);
                $this->addReference('skill24', $skill24);
                $this->addReference('skill25', $skill25);
                $this->addReference('skill26', $skill26);
	}

	public function getOrder() {
		return 6;
	}

}
