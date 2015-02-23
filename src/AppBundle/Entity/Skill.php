<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Skill
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SkillRepository")
 */
class Skill
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
	 * @var Skill
	 * 
	 * @ORM\ManyToOne(targetEntity="Skill", inversedBy="childs")
	 */
	private $parent;

	/**
	 * @var array
	 * @ORM\OneToMany(targetEntity="Skill", mappedBy="parent")
	 */
	private $childs;

	/**
	 * @var UserSkill
	 * 
	 * @ORM\OneToMany(targetEntity="UserSkill", mappedBy="skill")
	 */
	private $userSkills;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Skill
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->childs = new ArrayCollection();
    }

    /**
     * Set parent
     *
     * @param Skill $parent
     * @return Skill
     */
    public function setParent(Skill $parent = null) {
        $this->parent = $parent;
		$parent->addChild($this);
        return $this;
    }

    /**
     * Get parent
     *
     * @return Skill 
     */
    public function getParent() {
        return $this->parent;
    }

    /**
     * Add childs
     *
     * @param Skill $childs
     * @return Skill
     */
    public function addChild(Skill $childs) {
        $this->childs[] = $childs;
		
        return $this;
    }

    /**
     * Remove childs
     *
     * @param Skill $childs
     */
    public function removeChild(Skill $childs) {
        $this->childs->removeElement($childs);
    }

    /**
     * Get childs
     *
     * @return Collection 
     */
    public function getChilds() {
        return $this->childs;
    }

    /**
     * Get userSkills
     *
     * @return UserSkill 
     */
    public function getUserSkills() {
        return $this->userSkills;
    }

    /**
     * Add userSkills
     *
     * @param UserSkill $userSkills
     * @return Skill
     */
    public function addUserSkill(UserSkill $userSkills) {
        $this->userSkills[] = $userSkills;
        return $this;
    }

    /**
     * Remove userSkills
     *
     * @param UserSkill $userSkills
     */
    public function removeUserSkill(UserSkill $userSkills) {
        $this->userSkills->removeElement($userSkills);
    }
}
