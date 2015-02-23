<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
	
	$category1 = new Category();
	$category1->setTitle('PHP')
		->addProject($this->getReference('category1'));

        $category2->setTitle('JavaScript')
		->addProject($this->getReference('category2'));
        
        $category3->setTitle('HTML - CSS')
		->addProject($this->getReference('category3'));
        
        $category4->setTitle('Java J2EE')
		->addProject($this->getReference('category4'));
        
        $category5->setTitle('C++')
		->addProject($this->getReference('category5'));
        
	$manager->persist($category1);
        $manager->persist($category2);
        $manager->persist($category3);
        $manager->persist($category4);
        $manager->persist($category5);


	
	$manager->flush();

	$this->addReference('category1', $category1);
        $this->addReference('category2', $category2);
        $this->addReference('category3', $category3);
        $this->addReference('category4', $category4);
        $this->addReference('category5', $category5);

        
	
    }

    public function getOrder() {
	return 1;
    }

}
