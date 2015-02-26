<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Project;
use AppBundle\Entity\Stage;
use AppBundle\Entity\UserProject;
use AppBundle\Form\ProjectType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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

	public function addAction(Request $req) {
		$em = $this->getDoctrine()->getManager();
		$project = new Project();
		$form = $this->createForm(new ProjectType(), $project, array(
			'action' => $this->generateUrl('project_add')
		));

		$form->handleRequest($req);
		if ($form->isValid()) {
			if ($project->getId() === null) {
				$em->persist($project);
			}
			$em->flush();
			$id = $project->getId();
			// Redirection vers le projet crée
			return $this->redirect($this->generateUrl('project_detail', array(
								'id' => $id,
							))
			);
		}
		// Aucun formulaire envoyé
		return $this->render('AppBundle:Project:add.html.twig', array(
					'form' => $form->createView()
		));
	}

}
