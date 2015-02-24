<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjectController extends Controller {

	public function listAction($page) {
		$em = $this->getDoctrine()->getManager();
		$repoP = $em->getRepository('AppBundle:Project');
		$projects = $repoP->findProjectsEager();

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
		$project = $repoP->findProjectEager($id);

		$stagesInfos = array(
			'term' => 0, 
			'current' =>0, 
			'left' => 0);
		$check = true;
		foreach ($project->getStages() as $stage) {
			if ($stage->getStatus()) {
				$stagesInfos['term'] += $stage->getVolume();
			} elseif ($check) {
				$check = false;
				$stagesInfos['current'] += $stage->getVolume();
			} else {
				$stagesInfos['left'] += $stage->getVolume();
			}
		}

		return $this->render('AppBundle:Project:project.html.twig', array(
					'project' => $project,
					'stagesInfos' => $stagesInfos
		));
	}

	public function addAction() {
		return $this->render('AppBundle:Project:add.html.twig');
	}

}
