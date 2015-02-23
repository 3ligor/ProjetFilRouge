<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjectController extends Controller {
	
    public function indexAction() {
        return $this->render('AppBundle:Project:index.html.twig');
    }
    
    public function listAction($page) {
        return $this->render('AppBundle:Project:list.html.twig');
    }
    
    public function mesProjetsAction($page) {
        return $this->render('AppBundle:Project:mesProjets.html.twig');
    }
    

}