<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller {

    public function indexAction() {
		return $this->render('AppBundle:Admin:index.html.twig');
    }

    public function skillAction() {
		return $this->render('AppBundle:Admin:skill.html.twig');
    }

    public function projectAction() {
		$projects = $this->getDoctrine()
				->getManager()
				->getRepository('AppBundle:Project')
				->findAll();
		return $this->render('AppBundle:Admin:project.html.twig', array(
		    'projects' => $projects
			));
    }

    public function userAction() {
		return $this->render('AppBundle:Admin:user.html.twig');
    }

    public function importAction() {
		return $this->render('AppBundle:Admin:import.html.twig');
    }

}
