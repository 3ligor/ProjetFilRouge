<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjectController extends Controller {
	
    public function indexAction() {
        return $this->render('AppBundle:Project:index.html.twig');
    }
}