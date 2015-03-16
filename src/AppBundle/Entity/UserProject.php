<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserProject
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="UserProjectRepository")
 */
class UserProject {

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="status", type="integer")
	 */
	private $status; // 0 = suppression, 1 = invitation, 2 = postulation, 3 = membre, 4 = chef

	/**
	 * @var User
	 * 
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="userProjects")
	 */
	private $user;

	/**
	 * @var Project
	 * 
	 * @ORM\ManyToOne(targetEntity="Project", inversedBy="userProjects")
	 */
	private $project;

	/**
	 * Get id
	 *
	 * @return integer 
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set status
	 *
	 * @param integer $status
	 * @return UserProject
	 */
	public function setStatus($status) {
		if ($status === 0) {
			$this->getProject()->removeUserProject($this);
		}
		$this->status = $status;
		return $this;
	}

	/**
	 * Get status
	 *
	 * @return integer 
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * Set user
	 *
	 * @param User $user
	 * @return UserProject
	 */
	public function setUser(User $user) {
		$this->user = $user;
		$user->addUserProject($this);
		return $this;
	}

	/**
	 * Get user
	 *
	 * @return User 
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * Set project
	 *
	 * @param Project $project
	 * @return UserProject
	 */
	public function setProject(Project $project = null) {
		$this->project = $project;
		return $this;
	}

	/**
	 * Get project
	 *
	 * @return Project 
	 */
	public function getProject() {
		return $this->project;
	}
	
	public function __toString() {
		return $this->user->getFirstname() . ' ' . $this->user->getLastname();
	}

}
