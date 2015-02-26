<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Project;
use AppBundle\Entity\Stage;
use AppBundle\Form\ProjectType;
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


		return $this->render('AppBundle:Project:project.html.twig', array(
					'project' => $project
		));
	}

	public function addAction() {
		$stage1 = (new Stage())->setTitle('Blablo')->setVolume(32)->setStatus(true);
		$stage2 = (new Stage())->setTitle('TesStage')->setVolume(12)->setStatus(false);
		$project = (new Project())->addStage($stage1)->addStage($stage2);

		$form = $this->createForm(new ProjectType(), $project, array(
			'action' => $this->generateUrl('project_add')
		));
		
		return $this->render('AppBundle:Project:add.html.twig', array(
			'form' => $form->createView()
		));
	}

}
