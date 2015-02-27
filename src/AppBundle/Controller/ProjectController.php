<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Project;
use AppBundle\Form\ProjectType;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
		$repoS = $em->getRepository('AppBundle:Skill');
		$project = $repoP->findProjectEager($id);
		$skills = $repoS->findAll();


		return $this->render('AppBundle:Project:project.html.twig', array(
					'project' => $project,
					'skills' => $skills
		));
	}

	public function addAction(Request $req) {
		$em = $this->getDoctrine()->getManager();
		$project = new Project();
//		$project->addUserProject((new UserProject())->setUser($this->user)->setStatus(4));
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

	public function updateAction(Project $project, Request $req) {
		$em = $this->getDoctrine()->getManager();
		if (!$project) {
			throw $this->createNotFoundException('Aucun projet trouvé pour cet id : ' . $project->getId());
		}

		$originalStages = new ArrayCollection();
		$originalUserProjects = new ArrayCollection();
		foreach ($project->getStages() as $stage) {
			$originalStages->add($stage);
		}
		foreach ($project->getUserProjects() as $userProject) {
			$originalUserProjects->add($userProject);
		}

		$form = $this->createForm(new ProjectType(), $project, array(
			'action' => $this->generateUrl('project_update', array(
				'id' => $project->getId(),
			))
		));

		$form->handleRequest($req);
		if ($form->isValid()) {

			// On supprime les étapes ayant été supprimé du projet
			foreach ($originalStages as $stage) {
				if ($project->getStages()->contains($stage) == false) {
					$stage->setProject(null);
					$em->persist($stage);
				}
			}

			// On supprime les user ayant été supprimé du projet
			foreach ($originalUserProjects as $userProject) {
				if ($project->getUserProjects()->contains($userProject) == false) {
					$userProject->setProject(null);
					$em->persist($userProject);
				}
			}

			// On vérifie que le projet possède au moins un leader
			$hasLeader = false;
			foreach ($project->getUserProjects() as $userProject) {
				if ($userProject->getStatus() === 4) {
					$hasLeader = true;
				}
			}
			if (!$hasLeader) {
				return $this->render('AppBundle:Project:add.html.twig', array(
							'form' => $form->createView(),
							'message' => 'Votre projet ne possède pas de chef de projet.'
				));
			}


			$em->persist($project);

			$em->flush();
			$id = $project->getId();
			// Redirection vers le projet modifié
			return $this->redirect($this->generateUrl('project_detail', array(
								'id' => $id,
							))
			);
		}

		return $this->render('AppBundle:Project:add.html.twig', array(
					'form' => $form->createView()
		));
	}

	public function removeProjectSkillAction($projectid, $skillid) {
		$em = $this->getDoctrine()->getManager();
		$repoP = $em->getRepository('AppBundle:Project');
		$repoS = $em->getRepository('AppBundle:Skill');

		$project = $repoP->find($projectid);
		$skill = $repoS->find($skillid);

		$project->removeSkill($skill);

		$em->flush();

		$response = new Response(json_encode(array('status' => 'ok')));
		$response->headers->set('Content-Type', 'application/json');
		
		return $response;
	}

	public function addProjectSkillAction($projectid, $skillid) {
		$em = $this->getDoctrine()->getManager();
		$repoP = $em->getRepository('AppBundle:Project');
		$repoS = $em->getRepository('AppBundle:Skill');

		$project = $repoP->find($projectid);
		$skill = $repoS->find($skillid);
		
		$project->addSkill($skill);

		$em->flush();

		$response = new Response(json_encode(array('status' => 'ok')));
		$response->headers->set('Content-Type', 'application/json');
		
		return $response;
	}

}
