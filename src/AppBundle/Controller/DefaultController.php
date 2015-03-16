<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

	public function indexAction() {
		$em = $this->getDoctrine()->getManager();
		$repoP = $em->getRepository('AppBundle:Project');
		$fiveProject = $repoP->findNewListIndexProject();
		
		$id = $this->getUser()->getId();
		$projects = $repoP->findProjectUserEager($id);
		
		return $this->render('AppBundle:Default:index.html.twig', array(
					'fiveProject' => $fiveProject,
					'projects'=> $projects,
					'enableChat' => true
		));
	}

}
