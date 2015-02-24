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
		$repo = $this->getDoctrine()
				->getManager()
				->getRepository('AppBundle:Project');
		$projects = $repo->getProjectsStatusPositive();
		return $this->render('AppBundle:Admin:project.html.twig', array(
					'projects' => $projects
		));
	}

	public function userAction() {
		$users = $this->getDoctrine()
				->getManager()
				->getRepository('AppBundle:User')
				->findAll();
		return $this->render('AppBundle:Admin:user.html.twig', array(
					'users' => $users
		));
	}

	public function importAction() {
		return $this->render('AppBundle:Admin:import.html.twig');
	}

}
