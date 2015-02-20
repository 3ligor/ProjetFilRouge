<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Skill
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\SkillRepository")
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
	 * @ORM\ManyToOne(targetEntity="UserSkill", inversedBy="skill")
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
        $this->childs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set parent
     *
     * @param \AppBundle\Entity\Skill $parent
     * @return Skill
     */
    public function setParent(\AppBundle\Entity\Skill $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \AppBundle\Entity\Skill 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add childs
     *
     * @param \AppBundle\Entity\Skill $childs
     * @return Skill
     */
    public function addChild(\AppBundle\Entity\Skill $childs)
    {
        $this->childs[] = $childs;

        return $this;
    }

    /**
     * Remove childs
     *
     * @param \AppBundle\Entity\Skill $childs
     */
    public function removeChild(\AppBundle\Entity\Skill $childs)
    {
        $this->childs->removeElement($childs);
    }

    /**
     * Get childs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChilds()
    {
        return $this->childs;
    }

    /**
     * Set userSkills
     *
     * @param \AppBundle\Entity\UserSkill $userSkills
     * @return Skill
     */
    public function setUserSkills(\AppBundle\Entity\UserSkill $userSkills = null)
    {
        $this->userSkills = $userSkills;

        return $this;
    }

    /**
     * Get userSkills
     *
     * @return \AppBundle\Entity\UserSkill 
     */
    public function getUserSkills()
    {
        return $this->userSkills;
    }
}
