<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller {
	
    public function indexAction() {
        return $this->render('AppBundle:Admin:index.html.twig');
    }

	public function skillAction() {
		return $this->render('AppBundle:Admin:index.html.twig');
	}

	public function projectAction() {
		return $this->render('AppBundle:Admin:index.html.twig');
	}

	public function userAction() {
		return $this->render('AppBundle:Admin:index.html.twig');
	}

	public function importAction() {
		return $this->render('AppBundle:Admin:index.html.twig');
	}
}