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
	$category2 = new Category();
	$category3 = new Category();
	$category4 = new Category();
	$category5 = new Category();
	
	$category1->setTitle('Web');
        $category2->setTitle('Mobile');
        $category3->setTitle('Application');
    
	$manager->persist($category1);
        $manager->persist($category2);
        $manager->persist($category3);

	$manager->flush();

	$this->addReference('category1', $category1);
        $this->addReference('category2', $category2);
        $this->addReference('category3', $category3);

        }

    public function getOrder() {
	return 2;
    }

}
