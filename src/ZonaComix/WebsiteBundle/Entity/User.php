<?php
namespace ZonaComix\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 * @UniqueEntity("username")
 * @UniqueEntity("email")
 */

class User implements UserInterface, \Serializable
{
    /**
     * @ORM\OneToMany(targetEntity="Reading", mappedBy="user")
     */
    private $readings;
	/**
	 * @ORM\OneToOne(targetEntity="Revenue", mappedBy="user", cascade={"persist"})
	 */
	protected $revenue;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="referrals")
     */
    private $referral;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="referral")
     */
    private $referrals;

	/**
	 * @ORM\OneToMany(targetEntity="Comic", mappedBy="user")
	 */
	protected $comics;

	/**
	 * @ORM\ManyToMany(targetEntity="User", mappedBy="users_following")
	 **/
	private $followers;

	/**
	 * @ORM\ManyToMany(targetEntity="User", inversedBy="followers")
	 * @ORM\JoinTable(name="users_follow",
	 *	  joinColumns={@ORM\JoinColumn(name="follower_id", referencedColumnName="id")},
	 *	  inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")}
	 *	  )
	 **/
	private $users_following;

    /**
     * @ORM\ManyToMany(targetEntity="Comic", inversedBy="followers")
     * @ORM\JoinTable(name="comics_follow",
     *    joinColumns={@ORM\JoinColumn(name="follower_id", referencedColumnName="id")},
     *    inverseJoinColumns={@ORM\JoinColumn(name="comic_id", referencedColumnName="id")}
     *    )
     **/
    private $comics_following;

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", options={"unsigned"=true})
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	/** @ORM\Column(type="date") */
	protected $register_date;
	/** @ORM\Column(type="string", length=32, unique=true) */
	protected $username;
	/** @ORM\Column(type="string", length=64, unique=true) */
	protected $email;
	/** @ORM\Column(type="text") */
	protected $password;
	/** @ORM\Column(type="text", nullable=true) */
	protected $display_name;
	/** @ORM\Column(type="text", nullable=true) */
	protected $phrase;
	/** @ORM\Column(type="date") */
	protected $premium_expire;
	/** @ORM\Column(type="boolean") */
	protected $active = false;
	/** @ORM\Column(type="text", nullable=true) */
	protected $website;
	/** @ORM\Column(type="text", nullable=true) */
	protected $facebook;
	/** @ORM\Column(type="text", nullable=true) */
	protected $twitter;
	/** @ORM\Column(type="text", nullable=true) */
	protected $google;
	/** @ORM\Column(type="text", nullable=true) */
	protected $tumblr;
	/** @ORM\Column(type="text", nullable=true) */
	protected $deviantART;
	/** @ORM\Column(type="text", nullable=true) */
	protected $youtube;
    /** @ORM\Column(type="date") */
    protected $referral_expire;

	//Constructor
	public function __construct()
	{
        $now = new \DateTime(date('d-m-Y', time()));
        $year = new \DateTime(date('d-m-Y', time() + 31536000));

        $this->register_date   = $now;
        $this->premium_expire  = $now;
        $this->referral_expire = $year;

        $this->revenue = (new Revenue())->setUser( $this );

        $this->readings         = new ArrayCollection();
        $this->referrals        = new ArrayCollection();
		$this->comics	        = new ArrayCollection();
		$this->followers        = new ArrayCollection();
        $this->users_following  = new ArrayCollection();
        $this->comics_following = new ArrayCollection();
	}

	/**
	 * @inheritDoc
	 */
	public function getSalt()
	{
		return null;
	}

	/**
	 * @inheritDoc
	 */
	public function getRoles()
	{
		return array('ROLE_USER');
	}

	/**
	 * @inheritDoc
	 */
	public function eraseCredentials()
	{
	}

	/**
	 * @see \Serializable::serialize()
	 */
	public function serialize()
	{
		return serialize(array(
			$this->id,
			$this->username,
			$this->password,
		));
	}

	/**
	 * @see \Serializable::unserialize()
	 */
	public function unserialize($serialized)
	{
		list (
			$this->id,
			$this->username,
			$this->password,
		) = unserialize($serialized);
	}

	/**
	 * Set username
	 *
	 * @param string $username
	 * @return User
	 */
	public function setUsername($username)
	{
		$this->username = $username;

		return $this;
	}

	/**
	 * Get username
	 *
	 * @return string 
	 */
	public function getUsername()
	{
		return $this->username;
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set register_date
     *
     * @param \DateTime $registerDate
     * @return User
     */
    public function setRegisterDate($registerDate)
    {
        $this->register_date = $registerDate;

        return $this;
    }

    /**
     * Get register_date
     *
     * @return \DateTime 
     */
    public function getRegisterDate()
    {
        return $this->register_date;
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
     * Set display_name
     *
     * @param string $displayName
     * @return User
     */
    public function setDisplayName($displayName)
    {
        $this->display_name = $displayName;

        return $this;
    }

    /**
     * Get display_name
     *
     * @return string 
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Set phrase
     *
     * @param string $phrase
     * @return User
     */
    public function setPhrase($phrase)
    {
        $this->phrase = $phrase;

        return $this;
    }

    /**
     * Get phrase
     *
     * @return string 
     */
    public function getPhrase()
    {
        return $this->phrase;
    }

    /**
     * Set premium_expire
     *
     * @param \DateTime $premiumExpire
     * @return User
     */
    public function setPremiumExpire($premiumExpire)
    {
        $this->premium_expire = $premiumExpire;

        return $this;
    }

    /**
     * Get premium_expire
     *
     * @return \DateTime 
     */
    public function getPremiumExpire()
    {
        return $this->premium_expire;
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
     * Set website
     *
     * @param string $website
     * @return User
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     * @return User
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string 
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     * @return User
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string 
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set google
     *
     * @param string $google
     * @return User
     */
    public function setGoogle($google)
    {
        $this->google = $google;

        return $this;
    }

    /**
     * Get google
     *
     * @return string 
     */
    public function getGoogle()
    {
        return $this->google;
    }

    /**
     * Set tumblr
     *
     * @param string $tumblr
     * @return User
     */
    public function setTumblr($tumblr)
    {
        $this->tumblr = $tumblr;

        return $this;
    }

    /**
     * Get tumblr
     *
     * @return string 
     */
    public function getTumblr()
    {
        return $this->tumblr;
    }

    /**
     * Set deviantART
     *
     * @param string $deviantART
     * @return User
     */
    public function setDeviantART($deviantART)
    {
        $this->deviantART = $deviantART;

        return $this;
    }

    /**
     * Get deviantART
     *
     * @return string 
     */
    public function getDeviantART()
    {
        return $this->deviantART;
    }

    /**
     * Set youtube
     *
     * @param string $youtube
     * @return User
     */
    public function setYoutube($youtube)
    {
        $this->youtube = $youtube;

        return $this;
    }

    /**
     * Get youtube
     *
     * @return string 
     */
    public function getYoutube()
    {
        return $this->youtube;
    }

    /**
     * Set referral_expire
     *
     * @param \DateTime $referralExpire
     * @return User
     */
    public function setReferralExpire($referralExpire)
    {
        $this->referral_expire = $referralExpire;

        return $this;
    }

    /**
     * Get referral_expire
     *
     * @return \DateTime 
     */
    public function getReferralExpire()
    {
        return $this->referral_expire;
    }

    /**
     * Set revenue
     *
     * @param \ZonaComix\WebsiteBundle\Entity\Revenue $revenue
     * @return User
     */
    public function setRevenue(\ZonaComix\WebsiteBundle\Entity\Revenue $revenue = null)
    {
        $this->revenue = $revenue;

        return $this;
    }

    /**
     * Get revenue
     *
     * @return \ZonaComix\WebsiteBundle\Entity\Revenue 
     */
    public function getRevenue()
    {
        return $this->revenue;
    }

    /**
     * Set referral
     *
     * @param \ZonaComix\WebsiteBundle\Entity\User $referral
     * @return User
     */
    public function setReferral(\ZonaComix\WebsiteBundle\Entity\User $referral = null)
    {
        $this->referral = $referral;

        return $this;
    }

    /**
     * Get referral
     *
     * @return \ZonaComix\WebsiteBundle\Entity\User 
     */
    public function getReferral()
    {
        return $this->referral;
    }

    /**
     * Add referrals
     *
     * @param \ZonaComix\WebsiteBundle\Entity\User $referrals
     * @return User
     */
    public function addReferral(\ZonaComix\WebsiteBundle\Entity\User $referrals)
    {
        $this->referrals[] = $referrals;

        return $this;
    }

    /**
     * Remove referrals
     *
     * @param \ZonaComix\WebsiteBundle\Entity\User $referrals
     */
    public function removeReferral(\ZonaComix\WebsiteBundle\Entity\User $referrals)
    {
        $this->referrals->removeElement($referrals);
    }

    /**
     * Get referrals
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReferrals()
    {
        return $this->referrals;
    }

    /**
     * Add comics
     *
     * @param \ZonaComix\WebsiteBundle\Entity\Comic $comics
     * @return User
     */
    public function addComic(\ZonaComix\WebsiteBundle\Entity\Comic $comics)
    {
        $this->comics[] = $comics;

        return $this;
    }

    /**
     * Remove comics
     *
     * @param \ZonaComix\WebsiteBundle\Entity\Comic $comics
     */
    public function removeComic(\ZonaComix\WebsiteBundle\Entity\Comic $comics)
    {
        $this->comics->removeElement($comics);
    }

    /**
     * Get comics
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComics()
    {
        return $this->comics;
    }

    /**
     * Add followers
     *
     * @param \ZonaComix\WebsiteBundle\Entity\User $followers
     * @return User
     */
    public function addFollower(\ZonaComix\WebsiteBundle\Entity\User $followers)
    {
        $this->followers[] = $followers;

        return $this;
    }

    /**
     * Remove followers
     *
     * @param \ZonaComix\WebsiteBundle\Entity\User $followers
     */
    public function removeFollower(\ZonaComix\WebsiteBundle\Entity\User $followers)
    {
        $this->followers->removeElement($followers);
    }

    /**
     * Get followers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFollowers()
    {
        return $this->followers;
    }

    /**
     * Add users_following
     *
     * @param \ZonaComix\WebsiteBundle\Entity\User $usersFollowing
     * @return User
     */
    public function addUsersFollowing(\ZonaComix\WebsiteBundle\Entity\User $usersFollowing)
    {
        $this->users_following[] = $usersFollowing;

        return $this;
    }

    /**
     * Remove users_following
     *
     * @param \ZonaComix\WebsiteBundle\Entity\User $usersFollowing
     */
    public function removeUsersFollowing(\ZonaComix\WebsiteBundle\Entity\User $usersFollowing)
    {
        $this->users_following->removeElement($usersFollowing);
    }

    /**
     * Get users_following
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsersFollowing()
    {
        return $this->users_following;
    }

    /**
     * Add comics_following
     *
     * @param \ZonaComix\WebsiteBundle\Entity\Comic $comicsFollowing
     * @return User
     */
    public function addComicsFollowing(\ZonaComix\WebsiteBundle\Entity\Comic $comicsFollowing)
    {
        $this->comics_following[] = $comicsFollowing;

        return $this;
    }

    /**
     * Remove comics_following
     *
     * @param \ZonaComix\WebsiteBundle\Entity\Comic $comicsFollowing
     */
    public function removeComicsFollowing(\ZonaComix\WebsiteBundle\Entity\Comic $comicsFollowing)
    {
        $this->comics_following->removeElement($comicsFollowing);
    }

    /**
     * Get comics_following
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComicsFollowing()
    {
        return $this->comics_following;
    }

    /**
     * Add readings
     *
     * @param \ZonaComix\WebsiteBundle\Entity\Reading $readings
     * @return User
     */
    public function addReading(\ZonaComix\WebsiteBundle\Entity\Reading $readings)
    {
        $this->readings[] = $readings;

        return $this;
    }

    /**
     * Remove readings
     *
     * @param \ZonaComix\WebsiteBundle\Entity\Reading $readings
     */
    public function removeReading(\ZonaComix\WebsiteBundle\Entity\Reading $readings)
    {
        $this->readings->removeElement($readings);
    }

    /**
     * Get readings
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReadings()
    {
        return $this->readings;
    }
}
