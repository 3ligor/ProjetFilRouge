<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserSkill
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class UserSkill {
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
     * @ORM\Column(name="value", type="integer")
     */
    private $value;
	
		/**
	 * @var User
	 * 
	 * @ORM\OneToMany(targetEntity="User", mappedBy="userSkills")
	 */
	private $user;

	/**
	 * @var Skill
	 * 
	 * @ORM\OneToMany(targetEntity="Skill", mappedBy="userSkills")
	 */
	private $skill;


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
     * Set value
     *
     * @param integer $value
     * @return userSkill
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue()
    {
        return $this->value;
    }
}
