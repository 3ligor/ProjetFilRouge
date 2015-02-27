<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Project
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ProjectRepository")
 */
class Project {

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="title", type="string", length=255)
	 * @Assert\NotBlank()
	 */
	private $title;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="smallDescription", type="string", length=255)
	 * @Assert\NotBlank()
	 */
	private $smallDescription;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="longDescription", type="text")
	 */
	private $longDescription;

	/**
	 * @var DateTime
	 *
	 * @ORM\Column(name="startDate", type="datetime")
	 * @Assert\DateTime()
	 */
	private $startDate;

	/**
	 * @var DateTime
	 *
	 * @ORM\Column(name="endDate", type="datetime")
	 */
	private $endDate;

	/**
	 * @var DateTime
	 *
	 * @ORM\Column(name="creationDate", type="datetime")
	 */
	private $creationDate;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="maxMembers", type="integer")
	 * @Assert\GreaterThan(value = 0)
	 * @Assert\NotBlank()
	 */
	private $maxMembers;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="status", type="integer")
	 */
	private $status;

	/**
	 * @var array
	 *
	 * @ORM\ManyToMany(targetEntity="Category", inversedBy="projects")
	 * @Assert\NotBlank()
	 */
	private $categories;

	/**
	 * @var array
	 * 
	 * @ORM\OneToMany(targetEntity="Stage", mappedBy="project", cascade={"persist"})
	 */
	private $stages;

	/**
	 *
	 * @var array
	 * 
	 * @ORM\OneToMany(targetEntity="UserProject", mappedBy="project", cascade={"persist"})
	 */
	private $userProjects;

	/**
	 * @var array
	 * 
	 * @ORM\ManyToMany(targetEntity="Skill", inversedBy="projects")
	 */
	private $skills;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->creationDate = new \DateTime();
		$this->categories = new ArrayCollection();
		$this->stages = new ArrayCollection();
		$this->userProjects = new ArrayCollection();
		$this->skills = new ArrayCollection();
	}

	/**
	 * Get id
	 *
	 * @return integer 
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set title
	 *
	 * @param string $title
	 * @return Project
	 */
	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}

	/**
	 * Get title
	 *
	 * @return string 
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Set smallDescription
	 *
	 * @param string $smallDescription
	 * @return Project
	 */
	public function setSmallDescription($smallDescription) {
		$this->smallDescription = $smallDescription;
		return $this;
	}

	/**
	 * Get smallDescription
	 *
	 * @return string 
	 */
	public function getSmallDescription() {
		return $this->smallDescription;
	}

	/**
	 * Set longDescription
	 *
	 * @param string $longDescription
	 * @return Project
	 */
	public function setLongDescription($longDescription) {
		$this->longDescription = $longDescription;
		return $this;
	}

	/**
	 * Get longDescription
	 *
	 * @return string 
	 */
	public function getLongDescription() {
		return $this->longDescription;
	}

	/**
	 * Set startDate
	 *
	 * @param DateTime $startDate
	 * @return Project
	 */
	public function setStartDate($startDate) {
		$this->startDate = $startDate;
		return $this;
	}

	/**
	 * Get startDate
	 *
	 * @return DateTime 
	 */
	public function getStartDate() {
		return $this->startDate;
	}

	/**
	 * Set endDate
	 *
	 * @param DateTime $endDate
	 * @return Project
	 */
	public function setEndDate($endDate) {
		$this->endDate = $endDate;
		return $this;
	}

	/**
	 * Get endDate
	 *
	 * @return DateTime 
	 */
	public function getEndDate() {
		return $this->endDate;
	}

	/**
	 * Set creationDate
	 *
	 * @param DateTime $creationDate
	 * @return Project
	 */
	public function setCreationDate($creationDate) {
		$this->creationDate = $creationDate;
		return $this;
	}

	/**
	 * Get creationDate
	 *
	 * @return DateTime 
	 */
	public function getCreationDate() {
		return $this->creationDate;
	}

	/**
	 * Set maxMembers
	 *
	 * @param integer $maxMembers
	 * @return Project
	 */
	public function setMaxMembers($maxMembers) {
		$this->maxMembers = $maxMembers;
		return $this;
	}

	/**
	 * Get maxMembers
	 *
	 * @return integer 
	 */
	public function getMaxMembers() {
		return $this->maxMembers;
	}

	/**
	 * Set status
	 *
	 * @param integer $status
	 * @return Project
	 */
	public function setStatus($status) {
		$this->status = $status;
		return $this;
	}

	public function toggleStatus($status) {
		if ($status === 'valider') {
			if ($this->getStatus() >= 4) {
				$this->setStatus($this->getStatus() - 4);
			} else {
				$this->setStatus($this->getStatus() + 4);
			}
		} elseif ($status === 'terminer') {
			if ($this->getStatus() === 2 && $this->getStatus() === 3 && $this->getStatus() >= 6) {
				$this->setStatus($this->getStatus() - 2);
			} else {
				$this->setStatus($this->getStatus() + 2);
			}
		} elseif ($status === 'archiver') {
			if ($this->getStatus() === 1 && $this->getStatus() === 3 && $this->getStatus() === 5 && $this->getStatus() === 7) {
				$this->setStatus($this->getStatus() - 1);
			} else {
				$this->setStatus($this->getStatus() + 1);
			}
		} else {
			return false;
		}
		return $this->getStatus();
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
	 * Add categories
	 *
	 * @param Category $categories
	 * @return Project
	 */
	public function addCategory(Category $categories) {
		$this->categories[] = $categories;
		$categories->addProject($this);
		return $this;
	}

	/**
	 * Remove categories
	 *
	 * @param Category $categories
	 */
	public function removeCategory(Category $categories) {
		$this->categories->removeElement($categories);
	}

	/**
	 * Get categories
	 *
	 * @return Collection 
	 */
	public function getCategories() {
		return $this->categories;
	}

	/**
	 * Add stage
	 *
	 * @param Stage $stage
	 * @return Project
	 */
	public function addStage(Stage $stage) {
		$this->stages[] = $stage;
		$stage->setProject($this);
		return $this;
	}

	public function setStages(ArrayCollection $stages) {
		foreach ($stages as $stage) {
			$stage->setProject($this);
		}

		$this->stages = $stages;
	}

	/**
	 * Removes stage
	 *
	 * @param Stage $stage
	 */
	public function removeStage(Stage $stage) {
		$this->stages->removeElement($stage);
	}

	/**
	 * Get stage
	 *
	 * @return Collection 
	 */
	public function getStages() {
		return $this->stages;
	}

	/**
	 * Add userProjects
	 *
	 * @param \AppBundle\Entity\UserProject $userProjects
	 * @return Project
	 */
	public function addUserProject(\AppBundle\Entity\UserProject $userProjects) {
		if (!$this->userExistsInProject($userProjects->getUser())) {   // On vérifie que l'utilisateur n'est pas déjà inscrit
			$this->userProjects[] = $userProjects;		// d'une façon ou d'une autre dans le projet.
			$userProjects->setProject($this);
		}
		return $this;
	}

	private function userExistsInProject(User $user) {
		foreach ($this->getUserProjects() as $userInProject) {
			if ($user === $userInProject->getUser()) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Remove userProjects
	 *
	 * @param \AppBundle\Entity\UserProject $userProjects
	 */
	public function removeUserProject(\AppBundle\Entity\UserProject $userProjects) {
		$this->userProjects->removeElement($userProjects);
	}

	/**
	 * Get userProjects
	 *
	 * @return \Doctrine\Common\Collections\Collection 
	 */
	public function getUserProjects() {
		return $this->userProjects;
	}

	public function getProgress() {
		$progress = array(
			'term' => 0,
			'current' => 0,
			'left' => 0);

		$check = true;

		foreach ($this->getStages() as $stage) {
			if ($stage->getStatus()) {
				$progress['term'] += $stage->getVolume();
			} elseif ($check) {
				$check = false;
				$progress['current'] += $stage->getVolume();
			} else {
				$progress['left'] += $stage->getVolume();
			}
		}
		
		foreach ($progress as $ii => $cell) {
			$progress[$ii] = round($cell/$this->getTotalStageVolume()*100, 1);
		}
		return $progress;
	}
	
	public function getTotalStageVolume() {
		$total = 0;
		foreach ($this->getStages() as $stage) {
			$total += $stage->getVolume();
		}
		return $total;
	}

	/**
	 * Add skills
	 *
	 * @param \AppBundle\Entity\Skill $skills
	 * @return Project
	 */
	public function addSkill(\AppBundle\Entity\Skill $skills) {
		$this->skills[] = $skills;
		$skills->addProject($this);
		return $this;
	}

	/**
	 * Remove skills
	 *
	 * @param \AppBundle\Entity\Skill $skill
	 */
	public function removeSkill(\AppBundle\Entity\Skill $skill) {
		$this->skills->removeElement($skill);
		$skill->removeProject($this);		
	}

	/**
	 * Get skills
	 *
	 * @return \Doctrine\Common\Collections\Collection 
	 */
	public function getSkills() {
		return $this->skills;
	}

}
