<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Skill;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller {

	public function indexAction() {
		return $this->render('AppBundle:Admin:index.html.twig');
	}

	public function skillAction() {
		$repo = $this->getDoctrine()
				->getManager()
				->getRepository('AppBundle:Skill');
		$skills = $repo->getSkillsWithChilds();
		return $this->render('AppBundle:Admin:skill.html.twig', array(
					'skills' => $skills
		));
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
		$repo = $this->getDoctrine()
				->getManager()
				->getRepository('AppBundle:User');
		$users = $repo->getUsersWithProject();
		return $this->render('AppBundle:Admin:user.html.twig', array(
					'users' => $users
		));
	}

	public function importAction() {
		return $this->render('AppBundle:Admin:import.html.twig');
	}

	public function validateProjectAction($id) {
		if ($id > 0) {
			$em = $this->getDoctrine()
					->getManager();
			$project = $em->getRepository('AppBundle:Project')->find($id);
			$project->toggleStatus('valider');
			$em->flush();
			return $this->redirect(
							$this->generateUrl('admin_project')
			);
		} else {
			throw $this->createNotFoundException('Article N°' . $id . ' introuvable');
		}
	}
	
	public function addSkillAction(Request $req) {
		$skill = new Skill;
		
		$rep = $this->getDoctrine()
				->getManager()
				->getRepository('AppBundle:Skill');
		
		$em = $this->getDoctrine()
				->getManager();
		
		$id = $req->get('selectCat');
		
		if ($id > 0){
			$skillParent = $rep->find($id);
			$skill->setTitle($req->get('title'));
			$skill->setParent($skillParent);
			$em->persist($skill);
			$em->flush();
			return $this->redirect(
							$this->generateUrl('admin_skill'));
		} else {
			$skill->setTitle($req->get('title'));
			$em->persist($skill);
			$em->flush();
			return $this->redirect(
							$this->generateUrl('admin_skill'));
		}
	}
	

}
