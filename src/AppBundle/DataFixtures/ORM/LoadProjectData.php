<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Project;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadProjectData extends AbstractFixture implements OrderedFixtureInterface {

	/**
	 * {@inheritDoc}
	 */
	public function load(ObjectManager $manager) {
		$smallDesc = "Class aptent taciti sociosqu ad litora torquent per conubia "
				. "nostra, per inceptos himenaeos volutpat.";
		$longDesc = "Aenean vitae hendrerit orci, fringilla vestibulum nulla. Ut iaculis diam a enim porttitor, nec sagittis est blandit. Etiam vestibulum vel ex nec bibendum. Vivamus dignissim pellentesque sem id sagittis. Nam lobortis rhoncus ante, et luctus sapien scelerisque a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla faucibus diam sem, id malesuada augue eleifend id. Donec sit amet eleifend lorem. Aenean suscipit tellus elementum lacus fermentum, ut faucibus turpis commodo. Mauris viverra ante in lobortis hendrerit. Integer facilisis elit fermentum turpis egestas ullamcorper. Sed sagittis dolor ut velit facilisis euismod. Suspendisse potenti. Vestibulum eget pharetra augue, id molestie eros. Donec aliquet efficitur quam vitae ullamcorper.";

		$project1 = new Project();
		$project1->setTitle('Liste de contacts en PHP')
				->setSmallDescription($smallDesc)
				->setLongDescription($longDesc)
				->setStartDate(new \DateTime())
				->setEndDate(new \DateTime())
				->setCreationDate(new \DateTime())
				->setMaxMembers(5)
				->setStatus(-1)
				->addCategory($this->getReference('category1'))
				->addSkill($this->getReference('skill1'))
				->addSkill($this->getReference('skill2'))
				->addSkill($this->getReference('skill4'))
				->addSkill($this->getReference('skill10'))
				->addSkill($this->getReference('skill5'))
				->addSkill($this->getReference('skill24'))
				->addSkill($this->getReference('skill16'))
				->addSkill($this->getReference('skill19'))
				->addSkill($this->getReference('skill12'))
				->addSkill($this->getReference('skill15'))
				->addUserProject($this->getReference('userProject2'))
				->addUserProject($this->getReference('userProject13'))
				->addUserProject($this->getReference('userProject38'))
				->addUserProject($this->getReference('userProject40'))
				->addUserProject($this->getReference('userProject49'))
				->addStage($this->getReference('stage11'))
				->addStage($this->getReference('stage12'))
				->addStage($this->getReference('stage13'))
				->addStage($this->getReference('stage14'));
				

		$project2 = new Project();
		$project2->setTitle('Liste de contacts en Javascript')
				->setSmallDescription($smallDesc)
				->setLongDescription($longDesc)
				->setStartDate(new \DateTime())
				->setEndDate(new \DateTime())
				->setCreationDate(new \DateTime())
				->setMaxMembers(10)
				->setStatus(0)
				->addCategory($this->getReference('category2'))
				->addSkill($this->getReference('skill1'))
				->addSkill($this->getReference('skill4'))
				->addSkill($this->getReference('skill12'))
				->addSkill($this->getReference('skill24'))
				->addSkill($this->getReference('skill21'))
				->addUserProject($this->getReference('userProject41'))
				->addUserProject($this->getReference('userProject39'))
				->addUserProject($this->getReference('userProject20'))
				->addUserProject($this->getReference('userProject4'))
				->addStage($this->getReference('stage21'))
				->addStage($this->getReference('stage22'))
				->addStage($this->getReference('stage23'))
				->addStage($this->getReference('stage24'))
				->addStage($this->getReference('stage25'));

		$project3 = new Project();
		$project3->setTitle('Liste de contacts en HTML-CSS')
				->setSmallDescription($smallDesc)
				->setLongDescription($longDesc)
				->setStartDate(new \DateTime())
				->setEndDate(new \DateTime())
				->setCreationDate(new \DateTime())
				->setMaxMembers(3)
				->setStatus(1)
				->addCategory($this->getReference('category3'))
				->addSkill($this->getReference('skill1'))
				->addSkill($this->getReference('skill3'))
				->addSkill($this->getReference('skill4'))
				->addSkill($this->getReference('skill21'))
				->addSkill($this->getReference('skill17'))
				->addSkill($this->getReference('skill19'))
				->addUserProject($this->getReference('userProject5'))
				->addUserProject($this->getReference('userProject14'))
				->addUserProject($this->getReference('userProject21'))
				->addUserProject($this->getReference('userProject22'))
				->addUserProject($this->getReference('userProject42'))
				->addStage($this->getReference('stage31'))
				->addStage($this->getReference('stage32'))
				->addStage($this->getReference('stage33'))
				->addStage($this->getReference('stage34'))
				->addStage($this->getReference('stage35'))
				->addStage($this->getReference('stage36'))
				->addStage($this->getReference('stage37'));

		$project4 = new Project();
		$project4->setTitle('Liste de contacts en Java J2EE')
				->setSmallDescription($smallDesc)
				->setLongDescription($longDesc)
				->setStartDate(new \DateTime())
				->setEndDate(new \DateTime())
				->setCreationDate(new \DateTime())
				->setMaxMembers(7)
				->setStatus(2)
				->addCategory($this->getReference('category1'))
				->addSkill($this->getReference('skill2'))
				->addSkill($this->getReference('skill4'))
				->addSkill($this->getReference('skill18'))
				->addSkill($this->getReference('skill11'))
				->addUserProject($this->getReference('userProject6'))
				->addUserProject($this->getReference('userProject10'))
				->addUserProject($this->getReference('userProject23'))
				->addUserProject($this->getReference('userProject25'))
				->addUserProject($this->getReference('userProject43'))
				->addStage($this->getReference('stage41'))
				->addStage($this->getReference('stage42'))
				->addStage($this->getReference('stage43'))
				->addStage($this->getReference('stage44'));

		$project5 = new Project();
		$project5->setTitle('Liste de contacts C++')
				->setSmallDescription($smallDesc)
				->setLongDescription($longDesc)
				->setStartDate(new \DateTime())
				->setEndDate(new \DateTime())
				->setCreationDate(new \DateTime())
				->setMaxMembers(13)
				->setStatus(3)
				->addCategory($this->getReference('category2'))
				->addSkill($this->getReference('skill1'))
				->addSkill($this->getReference('skill2'))
				->addSkill($this->getReference('skill4'))
				->addSkill($this->getReference('skill9'))
				->addSkill($this->getReference('skill15'))
				->addSkill($this->getReference('skill16'))
				->addSkill($this->getReference('skill19'))
				->addUserProject($this->getReference('userProject24'))
				->addUserProject($this->getReference('userProject26'))
				->addUserProject($this->getReference('userProject29'))
				->addUserProject($this->getReference('userProject44'))
				->addStage($this->getReference('stage51'))
				->addStage($this->getReference('stage52'))
				->addStage($this->getReference('stage53'))
				->addStage($this->getReference('stage54'))
				->addStage($this->getReference('stage55'))
				->addStage($this->getReference('stage56'));

		$project6 = new Project();
		$project6->setTitle('Liste de contacts en PHP et HTML-CSS')
				->setSmallDescription($smallDesc)
				->setLongDescription($longDesc)
				->setStartDate(new \DateTime())
				->setEndDate(new \DateTime())
				->setCreationDate(new \DateTime())
				->setMaxMembers(6)
				->setStatus(4)
				->addCategory($this->getReference('category3'))
				->addSkill($this->getReference('skill1'))
				->addSkill($this->getReference('skill3'))
				->addSkill($this->getReference('skill4'))
				->addSkill($this->getReference('skill7'))
				->addSkill($this->getReference('skill17'))
				->addSkill($this->getReference('skill25'))
				->addSkill($this->getReference('skill15'))
				->addSkill($this->getReference('skill5'))
				->addUserProject($this->getReference('userProject11'))
				->addUserProject($this->getReference('userProject27'))
				->addUserProject($this->getReference('userProject30'))
				->addUserProject($this->getReference('userProject34'))
				->addUserProject($this->getReference('userProject45'))
				->addStage($this->getReference('stage61'))
				->addStage($this->getReference('stage62'))
				->addStage($this->getReference('stage63'))
				->addStage($this->getReference('stage64'))
				->addStage($this->getReference('stage65'))
				->addStage($this->getReference('stage66'))
				->addStage($this->getReference('stage67'))
				->addStage($this->getReference('stage68'))
				->addStage($this->getReference('stage69'));

		$project7 = new Project();
		$project7->setTitle('Liste de contacts en Javascript et HTML')
				->setSmallDescription($smallDesc)
				->setLongDescription($longDesc)
				->setStartDate(new \DateTime())
				->setEndDate(new \DateTime())
				->setCreationDate(new \DateTime())
				->setMaxMembers(8)
				->setStatus(5)
				->addCategory($this->getReference('category1'))
				->addCategory($this->getReference('category2'))
				->addSkill($this->getReference('skill1'))
				->addSkill($this->getReference('skill2'))
				->addSkill($this->getReference('skill3'))
				->addUserProject($this->getReference('userProject28'))
				->addUserProject($this->getReference('userProject31'))
				->addUserProject($this->getReference('userProject35'))
				->addUserProject($this->getReference('userProject46'))
				->addStage($this->getReference('stage71'))
				->addStage($this->getReference('stage72'))
				->addStage($this->getReference('stage73'))
				->addStage($this->getReference('stage74'));

		$project8 = new Project();
		$project8->setTitle('Liste de contacts en JAVA et PHP')
				->setSmallDescription($smallDesc)
				->setLongDescription($longDesc)
				->setStartDate(new \DateTime())
				->setEndDate(new \DateTime())
				->setCreationDate(new \DateTime())
				->setMaxMembers(12)
				->setStatus(6)
				->addCategory($this->getReference('category1'))
				->addCategory($this->getReference('category3'))
				->addSkill($this->getReference('skill1'))
				->addSkill($this->getReference('skill2'))
				->addSkill($this->getReference('skill16'))
				->addSkill($this->getReference('skill19'))
				->addUserProject($this->getReference('userProject36'))
				->addUserProject($this->getReference('userProject7'))
				->addUserProject($this->getReference('userProject32'))
				->addUserProject($this->getReference('userProject47'))
				->addStage($this->getReference('stage81'))
				->addStage($this->getReference('stage82'))
				->addStage($this->getReference('stage83'))
				->addStage($this->getReference('stage84'));

		$project9 = new Project();
		$project9->setTitle('Liste de contacts en C++ et JAVA')
				->setSmallDescription($smallDesc)
				->setLongDescription($longDesc)
				->setStartDate(new \DateTime())
				->setEndDate(new \DateTime())
				->setCreationDate(new \DateTime())
				->setMaxMembers(6)
				->setStatus(7)
				->addCategory($this->getReference('category2'))
				->addCategory($this->getReference('category3'))
				->addSkill($this->getReference('skill1'))
				->addSkill($this->getReference('skill2'))
				->addSkill($this->getReference('skill3'))
				->addSkill($this->getReference('skill6'))
				->addSkill($this->getReference('skill12'))
				->addSkill($this->getReference('skill16'))
				->addSkill($this->getReference('skill17'))
				->addUserProject($this->getReference('userProject1'))
				->addUserProject($this->getReference('userProject3'))
				->addUserProject($this->getReference('userProject12'))
				->addUserProject($this->getReference('userProject37'))
				->addUserProject($this->getReference('userProject48'))
				->addStage($this->getReference('stage91'))
				->addStage($this->getReference('stage92'))
				->addStage($this->getReference('stage93'))
				->addStage($this->getReference('stage94'))
				->addStage($this->getReference('stage95'));

		$manager->persist($project1);
		$manager->persist($project2);
		$manager->persist($project3);
		$manager->persist($project4);
		$manager->persist($project5);
		$manager->persist($project6);
		$manager->persist($project7);
		$manager->persist($project8);
		$manager->persist($project9);

		$manager->flush();
	}

	public function getOrder() {
		return 9;
	}

}
