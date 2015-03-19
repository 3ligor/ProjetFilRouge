<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {

	public function indexAction() {
		$em = $this->getDoctrine()->getManager();
		$repoP = $em->getRepository('AppBundle:Project');
		$fiveProject = $repoP->findNewListIndexProject();

		$id = $this->getUser()->getId();
		$projects = $repoP->findProjectUserEager($id);



		$searchProjects = $repoP->findAll();
		$repoUser = $em->getRepository('AppBundle:User');
		$searchUsers = $repoUser->findAll();


		return $this->render('AppBundle:Default:index.html.twig', array(
					'fiveProject' => $fiveProject,
					'projects' => $projects,
					'enableChat' => true,
					'searchProjects' => $searchProjects,
					'searchUsers' => $searchUsers
		));
	}

	public function getSearchContentAction() {
		$em = $this->getDoctrine()->getManager();
		$repoP = $em->getRepository('AppBundle:Project');

		$searchProjects = $repoP->findAll();
		$repoUser = $em->getRepository('AppBundle:User');
		$searchUsers = $repoUser->findAll();

		return $this->render('AppBundle:Default:searchContent.html.twig', array(
					'searchProjects' => $searchProjects,
					'searchUsers' => $searchUsers
		));
	}

	public function firstLoginAction(Request $req) {
		$em = $this->getDoctrine()->getManager();
		$repoU = $em->getRepository('AppBundle:User');
		$user = $repoU->find($this->getUser()->getId());

		if ($req->request->get('password') === $req->request->get('confirmpassword') && $req->request->get('cgu') === 'on') {
			$user->setActive(true);
			$user->setPassword($req->request->get('password'));
			$em->flush();
		}
		
		return $this->redirect($this->generateUrl('home'));
	}

}
