<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller {

    public function indexAction() {

        $repo = $this->getDoctrine()->getManager()->getRepository('AppBundle:User');
        $repoSkill = $this->getDoctrine()->getManager()->getRepository('AppBundle:Skill');
        $users = $repo->findUsersEager();
        $skills = $repoSkill->findAll();

        return $this->render('AppBundle:User:list.html.twig', array(
                    'users' => $users,
                    'skills' => $skills
        ));
    }

    public function profileAction($id) {

        $em = $this->getDoctrine()->getManager();
        $repoUser =  $em->getRepository('AppBundle:User');

        $oneUser = $repoUser->findOneUserEager($id);
       
        return $this->render('AppBundle:User:profil.html.twig', array(
                    'user' => $oneUser,
                   
        ));
    }

}
