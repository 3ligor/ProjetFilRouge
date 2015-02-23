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
	
	$image1 = new Image();
	$image2 = new Image();
	$image3 = new Image();
	$image4 = new Image();
	$image5 = new Image();
	
	$image1->setUrl('http://lorempicsum.com/simpsons/200/200/9')
		->setAlt('utilistateur1');
	$image2->setUrl('http://lorempicsum.com/simpsons/200/200/8')
		->setAlt('utilistateur2');
	$image3->setUrl('http://lorempicsum.com/simpsons/200/200/7')
		->setAlt('utilistateur3');
	$image4->setUrl('http://lorempicsum.com/simpsons/200/200/6')
		->setAlt('utilistateur4');
	$image5->setUrl('http://lorempicsum.com/simpsons/200/200/5')
		->setAlt('utilistateur5');
	
        
	$manager->persist($image1);
        $manager->persist($image2);
        $manager->persist($image3);
        $manager->persist($image4);
        $manager->persist($image5);

	$manager->flush();

	$this->addReference('image1', $image1);
        $this->addReference('image2', $image2);
        $this->addReference('image3', $image3);
        $this->addReference('image4', $image4);
        $this->addReference('image5', $image5);

        }

    public function getOrder() {
	return 4;
    }

}
