<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjectController extends Controller {

	public function listAction($page) {
		$em = $this->getDoctrine()->getManager();
		$repoP = $em->getRepository('AppBundle:Project');
		$projects = $repoP->findAll();
		
		return $this->render('AppBundle:Project:list.html.twig', array(
			'projects' => $projects
		));
	}

	public function myProjectsAction() {
		return $this->render('AppBundle:Project:myProjects.html.twig');
	}

	public function detailAction($id) {
		$em = $this->getDoctrine()->getManager();
		$repoP = $em->getRepository('AppBundle:Project');
		$project = $repoP->find($id);
		
		return $this->render('AppBundle:Project:project.html.twig', array(
			'project' => $project
		));
	}

	public function addAction() {
		return $this->render('AppBundle:Project:add.html.twig');	
	}
}
