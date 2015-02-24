<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserProject
 *
 * @ORM\Table()
 * @ORM\Entity
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
	private $status; // 1 = invitation, 2 = postulation, 3 = membre

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
	 * @param \AppBundle\Entity\User $user
	 * @return UserProject
	 */
	public function setUser(\AppBundle\Entity\User $user = null) {
		$this->user = $user;
		$user->addUserProject($this);
		return $this;
	}

	/**
	 * Get user
	 *
	 * @return \AppBundle\Entity\User 
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * Set project
	 *
	 * @param \AppBundle\Entity\Project $project
	 * @return UserProject
	 */
	public function setProject(\AppBundle\Entity\Project $project = null) {
		$this->project = $project;
		$project->addUserProject($this);
		return $this;
	}

	/**
	 * Get project
	 *
	 * @return \AppBundle\Entity\Project 
	 */
	public function getProject() {
		return $this->project;
	}

}
