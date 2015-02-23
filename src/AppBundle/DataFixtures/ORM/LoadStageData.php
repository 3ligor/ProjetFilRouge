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
                ->setVolume('30')
		->setProject($this->getReference('project1'));
        
        $stage12 = new Stage();
	$stage12->setTitle('Etape 2')
                ->setVolume('10')
		->setProject($this->getReference('project1'));
        
        $stage13 = new Stage();
	$stage13->setTitle('Etape 3')
                ->setVolume('45')
		->setProject($this->getReference('project1'));
        
        $stage14 = new Stage();
	$stage14->setTitle('Etape 4')
                ->setVolume('15')
		->setProject($this->getReference('project1'));
        
        // Stage for project 2 

        $stage21 = new Stage();
	$stage21->setTitle('Etape 1')
                ->setVolume('10')
		->setProject($this->getReference('project2'));
        
        $stage22 = new Stage();
	$stage22->setTitle('Etape 2')
                ->setVolume('25')
		->setProject($this->getReference('project2'));
        
        $stage23 = new Stage();
	$stage23->setTitle('Etape 3')
                ->setVolume('25')
		->setProject($this->getReference('project2'));
        
        $stage24 = new Stage();
	$stage24->setTitle('Etape 4')
                ->setVolume('30')
		->setProject($this->getReference('project2'));
        
        $stage25 = new Stage();
	$stage25->setTitle('Etape 5')
                ->setVolume('10')
		->setProject($this->getReference('project2'));
        
        //Stage for project 3
        
        $stage31 = new Stage();
	$stage31->setTitle('Etape 1')
                ->setVolume('15')
		->setProject($this->getReference('project3'));
        
        $stage32 = new Stage();
	$stage32->setTitle('Etape 2')
                ->setVolume('15')
		->setProject($this->getReference('project3'));
        
        $stage33 = new Stage();
	$stage33->setTitle('Etape 3')
                ->setVolume('15')
		->setProject($this->getReference('project3'));
        
        $stage34 = new Stage();
	$stage34->setTitle('Etape 4')
                ->setVolume('15')
		->setProject($this->getReference('project3'));
        
        $stage35 = new Stage();
	$stage35->setTitle('Etape 5')
                ->setVolume('25')
		->setProject($this->getReference('project3'));
        
        $stage36 = new Stage();
	$stage36->setTitle('Etape 6')
                ->setVolume('10')
		->setProject($this->getReference('project3'));
        
        $stage37 = new Stage();
	$stage37->setTitle('Etape 7')
                ->setVolume('5')
		->setProject($this->getReference('project3'));
        
        // Stage for project 4
        
        $stage41 = new Stage();
	$stage41->setTitle('Etape 1')
                ->setVolume('5')
		->setProject($this->getReference('project4'));
        
        $stage42 = new Stage();
	$stage42->setTitle('Etape 2')
                ->setVolume('55')
		->setProject($this->getReference('project4'));
        
        $stage43 = new Stage();
	$stage43->setTitle('Etape 3')
                ->setVolume('25')
		->setProject($this->getReference('project4'));
        
        $stage44 = new Stage();
	$stage44->setTitle('Etape 4')
                ->setVolume('15')
		->setProject($this->getReference('project4'));
        
        // Stage for project 5
        
        $stage51 = new Stage();
	$stage51->setTitle('Etape 1')
                ->setVolume('15')
		->setProject($this->getReference('project5'));
                
        $stage52 = new Stage();
	$stage52->setTitle('Etape 2')
                ->setVolume('15')
		->setProject($this->getReference('project5'));
          
        $stage53 = new Stage();
	$stage53->setTitle('Etape 3')
                ->setVolume('35')
		->setProject($this->getReference('project5'));
                
        $stage54 = new Stage();
	$stage54->setTitle('Etape 4')
                ->setVolume('25')
		->setProject($this->getReference('project5'));
        
                
        $stage55 = new Stage();
	$stage55->setTitle('Etape 5')
                ->setVolume('5')
		->setProject($this->getReference('project5'));
                
        $stage56 = new Stage();
	$stage56->setTitle('Etape 6')
                ->setVolume('5')
		->setProject($this->getReference('project5'));
        
        // Stage for project 6
                      
        $stage61 = new Stage();
	$stage61->setTitle('Etape 1')
                ->setVolume('5')
		->setProject($this->getReference('project6'));
                              
        $stage62 = new Stage();
	$stage62->setTitle('Etape 2')
                ->setVolume('5')
		->setProject($this->getReference('project6'));
                              
        $stage63 = new Stage();
	$stage63->setTitle('Etape 3')
                ->setVolume('10')
		->setProject($this->getReference('project6'));
                              
        $stage64 = new Stage();
	$stage64->setTitle('Etape 4')
                ->setVolume('5')
		->setProject($this->getReference('project6'));
                              
        $stage65 = new Stage();
	$stage65->setTitle('Etape 5')
                ->setVolume('35')
		->setProject($this->getReference('project6'));
                              
        $stage66 = new Stage();
	$stage66->setTitle('Etape 6')
                ->setVolume('15')
		->setProject($this->getReference('project6'));
                              
        $stage67 = new Stage();
	$stage67->setTitle('Etape 7')
                ->setVolume('15')
		->setProject($this->getReference('project6'));
                              
        $stage68 = new Stage();
	$stage68->setTitle('Etape 8')
                ->setVolume('5')
		->setProject($this->getReference('project6'));
                              
        $stage69 = new Stage();
	$stage69->setTitle('Etape 9')
                ->setVolume('5')
		->setProject($this->getReference('project6'));
        
        // Stage for project 7
                              
        $stage71 = new Stage();
	$stage71->setTitle('Etape 1')
                ->setVolume('20')
		->setProject($this->getReference('project7'));
                                      
        $stage72 = new Stage();
	$stage72->setTitle('Etape 2')
                ->setVolume('20')
		->setProject($this->getReference('project7'));
                     
        $stage73 = new Stage();
	$stage73->setTitle('Etape 3')
                ->setVolume('40')
		->setProject($this->getReference('project7'));
                                      
        $stage74 = new Stage();
	$stage74->setTitle('Etape 4')
                ->setVolume('20')
		->setProject($this->getReference('project7'));
        
        // Stage fpr project 8
        
                                      
        $stage81 = new Stage();
	$stage81->setTitle('Etape 1')
                ->setVolume('20')
		->setProject($this->getReference('project8'));
                                      
        $stage82 = new Stage();
	$stage82->setTitle('Etape 2')
                ->setVolume('60')
		->setProject($this->getReference('project8'));
                                              
        $stage83 = new Stage();
	$stage83->setTitle('Etape 3')
                ->setVolume('10')
		->setProject($this->getReference('project8'));
        
                                              
        $stage84 = new Stage();
	$stage84->setTitle('Etape 4')
                ->setVolume('10')
		->setProject($this->getReference('project8'));
        
        // Stage for project 9
                                              
        $stage91 = new Stage();
	$stage91->setTitle('Etape 1')
                ->setVolume('10')
		->setProject($this->getReference('project9'));
                                                      
        $stage92 = new Stage();
	$stage92->setTitle('Etape 2')
                ->setVolume('15')
		->setProject($this->getReference('project9'));
                                                      
        $stage93 = new Stage();
	$stage93->setTitle('Etape 3')
                ->setVolume('40')
		->setProject($this->getReference('project9'));
                                                     
        $stage94 = new Stage();
	$stage94->setTitle('Etape 4')
                ->setVolume('20')
		->setProject($this->getReference('project9'));
                                                      
        $stage95 = new Stage();
	$stage95->setTitle('Etape 5')
                ->setVolume('15')
		->setProject($this->getReference('project9'));
        
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
	
    }

    public function getOrder() {
	return 8;
    }

}
