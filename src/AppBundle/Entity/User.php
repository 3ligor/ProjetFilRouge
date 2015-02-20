<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\UserRepository")
 */
class User
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
     * @ORM\Column(name="pseudo", type="string", length=255)
     */
    private $pseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="datetime")
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=14)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var boolean
     *
     * @ORM\Column(name="publicMail", type="boolean")
     */
    private $publicMail;

    /**
     * @var boolean
     *
     * @ORM\Column(name="publicCity", type="boolean")
     */
    private $publicCity;

    /**
     * @var boolean
     *
     * @ORM\Column(name="publicTel", type="boolean")
     */
    private $publicTel;

    /**
     * @var boolean
     *
     * @ORM\Column(name="publicBirthdate", type="boolean")
     */
    private $publicBirthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var boolean
     *
     * @ORM\Column(name="available", type="boolean")
     */
    private $available;
	
	/**
	 * @var array
	 * 
	 * @ORM\ManyToMany(targetEntity="Project", inversedBy="members")
	 */
	private $projects;
	
	/**
	 * @var array
	 * 
	 * @ORM\OneToMany(targetEntity="Project", mappedBy="leader")
	 */
	private $leadProjects;
	
	/**
	 * @var Promo
	 * 
	 * @ORM\ManyToMany(targetEntity="Promo", inversedBy="users")
	 */
	private $promo;
	
	/**
	 * @var Image
	 * 
	 * @ORM\OneToOne(targetEntity="Image", orphanRemoval=true)
	 */
	private $image;
	
	/**
	 * @var UserSkill
	 * 
	 * @ORM\ManyToOne(targetEntity="UserSkill", inversedBy="user")
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
     * Set pseudo
     *
     * @param string $pseudo
     * @return User
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string 
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set birtdate
     *
     * @param \DateTime $birtdate
     * @return User
     */
    public function setBirtdate($birtdate)
    {
        $this->birtdate = $birtdate;

        return $this;
    }

    /**
     * Get birtdate
     *
     * @return \DateTime 
     */
    public function getBirtdate()
    {
        return $this->birtdate;
    }

    /**
     * Set tel
     *
     * @param integer $tel
     * @return User
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return integer 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set publicMail
     *
     * @param boolean $publicMail
     * @return User
     */
    public function setPublicMail($publicMail)
    {
        $this->publicMail = $publicMail;

        return $this;
    }

    /**
     * Get publicMail
     *
     * @return boolean 
     */
    public function getPublicMail()
    {
        return $this->publicMail;
    }

    /**
     * Set publicCity
     *
     * @param boolean $publicCity
     * @return User
     */
    public function setPublicCity($publicCity)
    {
        $this->publicCity = $publicCity;

        return $this;
    }

    /**
     * Get publicCity
     *
     * @return boolean 
     */
    public function getPublicCity()
    {
        return $this->publicCity;
    }

    /**
     * Set publicTel
     *
     * @param boolean $publicTel
     * @return User
     */
    public function setPublicTel($publicTel)
    {
        $this->publicTel = $publicTel;

        return $this;
    }

    /**
     * Get publicTel
     *
     * @return boolean 
     */
    public function getPublicTel()
    {
        return $this->publicTel;
    }

    /**
     * Set publicBirthdate
     *
     * @param boolean $publicBirthdate
     * @return User
     */
    public function setPublicBirthdate($publicBirthdate)
    {
        $this->publicBirthdate = $publicBirthdate;

        return $this;
    }

    /**
     * Get publicBirthdate
     *
     * @return boolean 
     */
    public function getPublicBirthdate()
    {
        return $this->publicBirthdate;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return User
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set available
     *
     * @param string $available
     * @return User
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return string 
     */
    public function getAvailable()
    {
        return $this->available;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->projects = new \Doctrine\Common\Collections\ArrayCollection();
        $this->leadProjects = new \Doctrine\Common\Collections\ArrayCollection();
        $this->promo = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return User
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Add projects
     *
     * @param \AppBundle\Entity\Project $projects
     * @return User
     */
    public function addProject(\AppBundle\Entity\Project $projects)
    {
        $this->projects[] = $projects;

        return $this;
    }

    /**
     * Remove projects
     *
     * @param \AppBundle\Entity\Project $projects
     */
    public function removeProject(\AppBundle\Entity\Project $projects)
    {
        $this->projects->removeElement($projects);
    }

    /**
     * Get projects
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * Add leadProjects
     *
     * @param \AppBundle\Entity\Project $leadProjects
     * @return User
     */
    public function addLeadProject(\AppBundle\Entity\Project $leadProjects)
    {
        $this->leadProjects[] = $leadProjects;

        return $this;
    }

    /**
     * Remove leadProjects
     *
     * @param \AppBundle\Entity\Project $leadProjects
     */
    public function removeLeadProject(\AppBundle\Entity\Project $leadProjects)
    {
        $this->leadProjects->removeElement($leadProjects);
    }

    /**
     * Get leadProjects
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLeadProjects()
    {
        return $this->leadProjects;
    }

    /**
     * Add promo
     *
     * @param \AppBundle\Entity\Promo $promo
     * @return User
     */
    public function addPromo(\AppBundle\Entity\Promo $promo)
    {
        $this->promo[] = $promo;

        return $this;
    }

    /**
     * Remove promo
     *
     * @param \AppBundle\Entity\Promo $promo
     */
    public function removePromo(\AppBundle\Entity\Promo $promo)
    {
        $this->promo->removeElement($promo);
    }

    /**
     * Get promo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPromo()
    {
        return $this->promo;
    }

    /**
     * Set image
     *
     * @param \AppBundle\Entity\Image $image
     * @return User
     */
    public function setImage(\AppBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \AppBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set userSkills
     *
     * @param \AppBundle\Entity\UserSkill $userSkills
     * @return User
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
