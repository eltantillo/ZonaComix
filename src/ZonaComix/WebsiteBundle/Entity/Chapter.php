<?php
namespace ZonaComix\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="chapters")
 */

class Chapter
{
    /**
     * @ORM\ManyToOne(targetEntity="Comic", inversedBy="chapters")
     * @ORM\JoinColumn(name="comic_id", referencedColumnName="id")
     */
    protected $comic;

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", options={"unsigned"=true})
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	/** @ORM\Column(type="integer", options={"unsigned"=true}) */
	protected $number;
    /** @ORM\Column(type="integer", options={"unsigned"=true}) */
    protected $pages;
	/** @ORM\Column(type="string", length=64, nullable=true) */
	protected $title;
    /** @ORM\Column(type="datetime") */
	protected $publish_date;
    /** @ORM\Column(type="integer", options={"unsigned"=true}) */
    protected $readings = 0;
    /** @ORM\Column(type="boolean") */
    protected $visible;

    public function __construct() {
        $this->publish_date = new \DateTime(date('d-m-Y H:i:s', time()));;
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
     * Set number
     *
     * @param integer $number
     * @return Chapter
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Chapter
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
     * Set publish_date
     *
     * @param \DateTime $publishDate
     * @return Chapter
     */
    public function setPublishDate($publishDate)
    {
        $this->publish_date = $publishDate;

        return $this;
    }

    /**
     * Get publish_date
     *
     * @return \DateTime 
     */
    public function getPublishDate()
    {
        return $this->publish_date;
    }

    /**
     * Set readings
     *
     * @param integer $readings
     * @return Chapter
     */
    public function setReadings($readings)
    {
        $this->readings = $readings;

        return $this;
    }

    /**
     * Get readings
     *
     * @return integer 
     */
    public function getReadings()
    {
        return $this->readings;
    }

    /**
     * Set comic
     *
     * @param \ZonaComix\WebsiteBundle\Entity\Comic $comic
     * @return Chapter
     */
    public function setComic(\ZonaComix\WebsiteBundle\Entity\Comic $comic = null)
    {
        $this->comic = $comic;

        return $this;
    }

    /**
     * Get comic
     *
     * @return \ZonaComix\WebsiteBundle\Entity\Comic 
     */
    public function getComic()
    {
        return $this->comic;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     * @return Chapter
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean 
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set pages
     *
     * @param integer $pages
     * @return Chapter
     */
    public function setPages($pages)
    {
        $this->pages = $pages;

        return $this;
    }

    /**
     * Get pages
     *
     * @return integer 
     */
    public function getPages()
    {
        return $this->pages;
    }
}
