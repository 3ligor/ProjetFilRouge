<?php

namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use AppBundle\Form\UserEditSkillType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;


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
		$repoSkill = $em->getRepository('AppBundle:Skill');
        $oneUser = $repoUser->findOneUserEager($id);
		$skills = $repoSkill->getSkillsWithChilds();
       
        return $this->render('AppBundle:User:profil.html.twig', array(
                    'user' => $oneUser,
					'skills' => $skills, 
                   
        ));
    }

	public function updateProfilAction(User $user, Request $req){
        $form = $this->createForm(new UserType(), $user, array(
            'action' => $this->generateUrl('user_update', array('id'=> $user->getId() ))
        ));

        $form->handleRequest($req); //permet d'ajouter les valeurs 

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirect($this->generateUrl('user_profile', array('id'=> $user->getId() )));
        }

        return $this->render('AppBundle:User:update.html.twig', array(
                    'userform' => $form->createView(),
					'user' => $user,
        ));
	
	}
	
	public function updateSkillProfilAction(User $user, Request $req){
        $form = $this->createForm(new UserEditSkillType(), $user, array(
            'action' => $this->generateUrl('user_updateskill', array('id'=> $user->getId() ))
        ));

        $form->handleRequest($req); //permet d'ajouter les valeurs 

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirect($this->generateUrl('user_profile', array('id'=> $user->getId() )));
        }

        return $this->render('AppBundle:User:updateSkillProfil.html.twig', array(
                    'userSkillForm' => $form->createView(),
					'user' => $user,
        ));
	
	
	
	}
}
