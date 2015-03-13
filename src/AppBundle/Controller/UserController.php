<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Entity\UserSkill;
use AppBundle\Form\UserEditSkillType;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
		$repoUser = $em->getRepository('AppBundle:User');
		$repoSkill = $em->getRepository('AppBundle:Skill');
		$oneUser = $repoUser->findOneUserEager($id);
		$skills = $repoSkill->getSkillsWithChilds();

		return $this->render('AppBundle:User:profil.html.twig', array(
					'user' => $oneUser,
					'skills' => $skills,
		));
	}

	public function updateProfilAction(User $user, Request $req) {
		$form = $this->createForm(new UserType(), $user, array(
			'action' => $this->generateUrl('user_update', array('id' => $user->getId()))
		));

		$form->handleRequest($req); //permet d'ajouter les valeurs 

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->flush();
			return $this->redirect($this->generateUrl('user_profile', array('id' => $user->getId())));
		}

		return $this->render('AppBundle:User:update.html.twig', array(
					'userform' => $form->createView(),
					'user' => $user,
		));
	}

	public function updateSkillProfilAction(User $user, Request $req) {
		$form = $this->createForm(new UserEditSkillType(), $user, array(
			'action' => $this->generateUrl('user_updateskill', array('id' => $user->getId()))
		));

		$form->handleRequest($req); //permet d'ajouter les valeurs 

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->flush();
			return $this->redirect($this->generateUrl('user_profile', array('id' => $user->getId())));
		}

		return $this->render('AppBundle:User:updateSkillProfil.html.twig', array(
					'userSkillForm' => $form->createView(),
					'user' => $user,
		));
	}

	public function addSkillUserAction(Request $req) {

		$em = $this->getDoctrine()->getManager();
		$repoUser = $em->getRepository('AppBundle:User');
		$user = $repoUser->find($req->request->get('userId'));

		$repoSkill = $em->getRepository('AppBundle:Skill');
		$skill = $repoSkill->find($req->request->get('skillId'));
		
		$repoUserSkill = $em->getRepository('AppBundle:UserSkill');
		$userSkill = $repoUserSkill->find($req->request->get('userSkillId'));
				
		$value = $req->request->get('skillValue'); 

		if($value > 0){
			
			if($skill->existInUser($user)){
				
				$userSkill->setValue($value);
				$response = new Response(json_encode(array(
							'status' => 'update',
				)));
			} else{
				
				if( $skill->getParent()->existInUser($user) ){

					$newSkill = new UserSkill();
					$newSkill->setUser($user)->setSkill($skill)->setValue($value);
					$response = new Response(json_encode(array(
								'status' => 'add',
					)));
					$em->persist($newSkill);
				} else {

					$newParentSkill = new UserSkill();
					$newParentSkill->setUser($user)->setSkill($skill->getParent())->setValue(-1);

					$newSkill = new UserSkill();
					$newSkill->setUser($user)->setSkill($skill)->setValue($value);
					$response = new Response(json_encode(array(
								'status' => 'add & parents',
					)));

					$em->persist($newSkill);
					$em->persist($newParentSkill);
				}
			}

		} else {
			
			$cpt = 0;
				
			foreach( $skill->getParent()->getChilds() as $child) {
				if($child->existInUser($user)){
					$cpt ++;
				}
			}
			
			if($cpt >= 2){
				
				
				$em->remove($userSkill);
				
				$response = new Response(json_encode(array(
							'status' => $userSkill->getUser()->getFirstname(),
				)));
				
			} else {
				$skillId = $skill->getParent();
				$userId = $req->request->get('userId');
				$repoUserParentSkill = $em->getRepository('AppBundle:UserSkill');
				$userSkill = $repoUserParentSkill->getSearchUserSkill($skillId, $userId);
				
				$em->remove($userSkill);
				

				$response = new Response(json_encode(array(
							'status' => 'remove skill & parent',
				)));
			}
			
			
		}
		$em->flush();
		$response->headers->set('Content-Type', 'application/json');
		return $response;
	}
	
	public function searchUserSkill($skill, $user){
		
	}

}
