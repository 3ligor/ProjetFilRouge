<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller {

	public function indexAction() {
		return $this->render('AppBundle:User:list.html.twig');
	}

	public function profileAction($id) {
		$em = $this->getDoctrine()->getManager();
		$repoUser = $em->getRepository('AppBundle:User');
		$user = $repoUser->find($id);

		return $this->render('AppBundle:User:list.html.twig', array(
					'user' => $user
		));
	}

}
