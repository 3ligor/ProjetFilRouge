<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Skill;
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
                    'projects'=>$projects,
                    'skills' => $skills
        ));
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

    public function importAction() {
        return $this->render('AppBundle:Admin:import.html.twig');
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
