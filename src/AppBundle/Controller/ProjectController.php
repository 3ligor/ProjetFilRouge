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

	public function myProjectsAction() {
		return $this->render('AppBundle:Project:mesProjets.html.twig');
	}

	public function detailAction($id) {
		return $this->render('AppBundle:Project:project.html.twig');
	}
	
	public function addAction() {
		return $this->render('AppBundle:Project:add.html.twig');	
	}

}
