<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ProjectRepository")
 */
class Project
{
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
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="smallDescription", type="string", length=255)
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
     */
    private $categories;

	/**
	 * @var User
	 * @ORM\ManyToMany(targetEntity="User", mappedBy="projects")
	 */
	private $members;

	/**
	 * @var User
	 * 
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="leadProjects")
	 */
	private $leader;

	/**
	 * @var array
	 * 
	 * ORM\OneToMany(targetEntity="Stage", mappedBy="project", orphanRemoval=true)
	 */
	private $stages;
	
    /**
     * Constructor
     */
    public function __construct() {
        $this->categories = new ArrayCollection();
        $this->members = new ArrayCollection();
		$this->stages = new ArrayCollection();
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
     * Add members
     *
     * @param User $members
     * @return Project
     */
    public function addMember(User $members) {
        $this->members[] = $members;
		$members->addProject($this);
        return $this;
    }

    /**
     * Remove members
     *
     * @param User $members
     */
    public function removeMember(User $members) {
        $this->members->removeElement($members);
    }

    /**
     * Get members
     *
     * @return Collection 
     */
    public function getMembers() {
        return $this->members;
    }

    /**
     * Set leader
     *
     * @param User $leader
     * @return Project
     */
    public function setLeader(User $leader = null) {
        $this->leader = $leader;
		$leader->addLeadProject($this);
        return $this;
    }

    /**
     * Get leader
     *
     * @return User 
     */
    public function getLeader() {
        return $this->leader;
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

    /**
     * Removes stage
     *
     * @param Stage $stage
     */
    public function removeStage(Stage $stage) {
        $this->categories->removeElement($stage);
    }

    /**
     * Get stage
     *
     * @return Collection 
     */
    public function getStages() {
        return $this->categories;
    }
	
}
