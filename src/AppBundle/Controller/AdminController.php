<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Promo;
use AppBundle\Entity\Skill;
use AppBundle\Entity\User;
use AppBundle\Entity\Image;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class AdminController extends Controller {

	public function homeAction() {
		$users = $this->getDoctrine()
				->getManager()
				->getRepository('AppBundle:User')
				->findAll();
		$projects = $this->getDoctrine()
				->getManager()
				->getRepository('AppBundle:Project')
				->findAll();
		$skills = $this->getDoctrine()
				->getManager()
				->getRepository('AppBundle:Skill')
				->findAll();

		return $this->render('AppBundle:Admin:home.html.twig', array(
					'users' => $users,
					'projects' => $projects,
					'skills' => $skills
		));
	}

	public function statisticsAction(Request $req) {
		$projects = $this->getDoctrine()
				->getManager()
				->getRepository('AppBundle:Project')
				->findAll();
		$response = new JsonResponse();
		$response->setData($projects);
		return $response;
	}

	public function skillAction() {
		$repo = $this->getDoctrine()
				->getManager()
				->getRepository('AppBundle:Skill');
		$skills = $repo->getSkillsWithChilds();
		return $this->render('AppBundle:Admin:skill.html.twig', array(
					'skills' => $skills
		));
	}

	public function projectAction() {
		$repo = $this->getDoctrine()
				->getManager()
				->getRepository('AppBundle:Project');
		$projects = $repo->getProjectsStatusPositive();
		return $this->render('AppBundle:Admin:project.html.twig', array(
					'projects' => $projects
		));
	}

	public function userAction() {
		$repo = $this->getDoctrine()
				->getManager()
				->getRepository('AppBundle:User');
		$users = $repo->getUsersWithProject();
		return $this->render('AppBundle:Admin:user.html.twig', array(
					'users' => $users
		));
	}

	public function importAction(Request $req) {
		$form = $this->createFormBuilder()
				->add('submitFile', 'file')
				->add('Valider', 'submit',array(
					'attr' => array('class' => 'btn btn-primary')))
				->getForm();

		$form->handleRequest($req);
		if ($form->isValid()) {
			$file = $form->get('submitFile');
			$filename = $file->getData();
			$this->handleCsv($filename);
		}
		return $this->render('AppBundle:Admin:import.html.twig', array(
					'form' => $form->createView(),
						)
		);
	}

	private function handleCsv($filename) {
		$em = $this->getDoctrine()->getManager();
		$repoU = $em->getRepository('AppBundle:User');
		$repoP = $em->getRepository('AppBundle:Promo');

		if (($handle = fopen($filename, 'r')) !== FALSE) {
			$row = 0;
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$row++;
				if ($row === 1) {
					continue;
				}

				// On cherche si l'utilisateur existe déjà, sinon on le crée
				$user = $repoU->findUserByMail($data[10]);
				if (is_object($user)) {
					continue;
				} else {
					$user = new User();
					$image = new Image();
					
				}
				
				// On cherche si la promo existe déjà, sinon on la crée
				$promoTitle = $data[1] . '-' . $data[2];
				$promo = $repoP->findPromoByTitle($promoTitle);			
				if (!is_object($promo)) {
					$promo = new Promo();
					$promo->setTitle($promoTitle);
					$em->persist($promo);
				}
				
				// On définit les attributs par défaut :
				$user->setPseudo('')
						->setPublicMail(false)
						->setPublicCity(false)
						->setPublicTel(false)
						->setPublicBirthdate(false)
						->setSalt('')
						->setRoles('ROLE_USER')
						->setActive(false)
						->setAvailable(true);
				
				
				
				// Puis les champs depuis le fichier chargé
				$image->setUrl('{{asset("bundles/app/img/mignon-hitman.png")}}')
						->setAlt('Default image');
				$user->setImage($image);
				$user->addPromo($promo);
				$user->setLastname($data[4]);
				$user->setFirstname($data[5]);
				$user->setCity($data[8]);
				$user->setTel($data[9]);
				$user->setEmail($data[10]);
				$user->setBirthdate($this->createDateTimeFromString($data[11]));
				$em->persist($image);
				$em->persist($user);
				
				
				// On flush & clear toutes les 10 lignes du fichier CSV afin de surcharger la mémoire.
				if ($row % 10 === 0) {
					$em->flush();
					$em->clear();
				}
			}
			$em->flush();
			$em->clear();
			fclose($handle);
		}
	}

	private function createDateTimeFromString($dateString) {
		$datetime = new DateTime();
		$y = intval(substr($dateString, -4));
		$m = intval(substr($dateString, 3, 2));
		$d = intval(substr($dateString, 0, 2));
		$datetime->setDate($y, $m, $d);
		return $datetime;
	}

	public function validateProjectAction($id) {
		// If we have an id
		if ($id > 0) {
			$em = $this->getDoctrine()
					->getManager();
			// Select the project by his id
			$project = $em->getRepository('AppBundle:Project')->find($id);
			// Call the "toggleStatus" function who change the status of a project
			$project->toggleStatus('valider');
			$em->flush();
			return $this->redirect(
							$this->generateUrl('admin_project')
			);
		} else {
			throw $this->createNotFoundException('Projet N°' . $id . ' introuvable');
		}
	}

	public function addSkillAction(Request $req) {
		$skill = new Skill;

		$rep = $this->getDoctrine()
				->getManager()
				->getRepository('AppBundle:Skill');

		$em = $this->getDoctrine()
				->getManager();
		// Determinate the id of the selected category
		$id = $req->get('selectCat');

		// If the user has selected a category
		if ($id > 0) {
			// The added skill will have a parent which is the selected category
			$skillParent = $rep->find($id);
			// Setting the title and the parent to the added skill
			$skill->setTitle($req->get('title'));
			$skill->setParent($skillParent);
			$em->persist($skill);
			$em->flush();
			return $this->redirect(
							$this->generateUrl('admin_skill'));
		}
		// If the user hasn't selected a category
		else {
			// the skill will be a category without parent
			$skill->setTitle($req->get('title'));
			$em->persist($skill);
			$em->flush();
			return $this->redirect(
							$this->generateUrl('admin_skill'));
		}
	}

	public function deleteSkillAction($id) {
		if ($id > 0) {
			$em = $this->getDoctrine()
					->getManager();

			$skill = $em->getRepository('AppBundle:Skill')->find($id);
			$em->remove($skill);
			$em->flush();

			return $this->redirect(
							$this->generateUrl('admin_skill')
			);
		} else {
			throw $this->createNotFoundException('Skill N°' . $id . ' introuvable');
		}
	}

	public function updateSkillAction(Request $req) {
		$id = ($req->request->get('id'));

		if ($id > 0) {
			$em = $this->getDoctrine()
					->getManager();
			$skill = $em->getRepository('AppBundle:Skill')->find($id);

			$skill->setTitle($req->get('title'));

			$em->merge($skill);
			$em->flush();

			$response = new JsonResponse();
			$response->setData(array(
				'data' => 'ok'));
			return $response;
		} else {
			throw $this->createNotFoundException('Skill N°' . $id . ' introuvable');
		}
	}

}
