<?php

namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller {

    public function indexAction() {
		$em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('AppBundle:User');
        $repoSkill = $em->getRepository('AppBundle:Skill');
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

	public function updateAction($id, Request $req){
		
		$em = $this->getDoctrine()->getManager();
        $repoUser =  $em->getRepository('AppBundle:User');

        $oneUser = $repoUser->findOneUserEager($id);

        $form = $this->createForm(new UserType(), $oneUser, array(
            'action' => $this->generateUrl('user_update')
        ));

        $form->handleRequest($req); //permet d'ajouter les valeurs 

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
       
            $em->flush();

            return $this->redirect($this->generateUrl('user_update'));
        }

        return $this->render('AppBundle:User:update.html.twig', array(
                    'userform' => $form->createView(),
					'user' => $oneUser,
        ));
	
	}
	
}
