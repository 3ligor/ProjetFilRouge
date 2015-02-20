<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller {
	
    public function indexAction() {
        return $this->render('AppBundle:User:index.html.twig');
    }
}