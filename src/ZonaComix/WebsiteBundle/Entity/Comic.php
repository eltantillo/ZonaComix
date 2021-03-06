<?php
namespace ZonaComix\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="comics")
 * @UniqueEntity("title")
 */

class Comic
{
    /**
     * @ORM\OneToMany(targetEntity="Reading", mappedBy="comic")
     */
    protected $readings;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="comics")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="comics_following")
     **/
    private $followers;

    /**
     * @ORM\OneToMany(targetEntity="Chapter", mappedBy="comic")
     */
    protected $chapters;

    public function __construct() {
        $this->chapters = new ArrayCollection();
    }

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", options={"unsigned"=true})
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	/** @ORM\Column(type="string", length=64, unique=true) */
	protected $title;
	/** @ORM\Column(type="text") */
	protected $description;
	/** @ORM\Column(type="smallint", options={"unsigned"=true}) */
	protected $license;
    /** @ORM\Column(type="smallint", options={"unsigned"=true}) */
    protected $rating;
	/** @ORM\Column(type="smallint", options={"unsigned"=true}) */
    protected $genre;
    /** @ORM\Column(type="smallint", options={"unsigned"=true}) */
    protected $style;

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
     * @return Comic
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
     * Set description
     *
     * @param string $description
     * @return Comic
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set license
     *
     * @param integer $license
     * @return Comic
     */
    public function setLicense($license)
    {
        $this->license = $license;

        return $this;
    }

    /**
     * Get license
     *
     * @return integer 
     */
    public function getLicense()
    {
        return $this->license;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     * @return Comic
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return integer 
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set genre
     *
     * @param integer $genre
     * @return Comic
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return integer 
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set style
     *
     * @param integer $style
     * @return Comic
     */
    public function setStyle($style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Get style
     *
     * @return integer 
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * Set user
     *
     * @param \ZonaComix\WebsiteBundle\Entity\User $user
     * @return Comic
     */
    public function setUser(\ZonaComix\WebsiteBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \ZonaComix\WebsiteBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add followers
     *
     * @param \ZonaComix\WebsiteBundle\Entity\User $followers
     * @return Comic
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
     * Add chapters
     *
     * @param \ZonaComix\WebsiteBundle\Entity\Chapter $chapters
     * @return Comic
     */
    public function addChapter(\ZonaComix\WebsiteBundle\Entity\Chapter $chapters)
    {
        $this->chapters[] = $chapters;

        return $this;
    }

    /**
     * Remove chapters
     *
     * @param \ZonaComix\WebsiteBundle\Entity\Chapter $chapters
     */
    public function removeChapter(\ZonaComix\WebsiteBundle\Entity\Chapter $chapters)
    {
        $this->chapters->removeElement($chapters);
    }

    /**
     * Get chapters
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChapters()
    {
        return $this->chapters;
    }

    /**
     * Add readings
     *
     * @param \ZonaComix\WebsiteBundle\Entity\Reading $readings
     * @return Comic
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
