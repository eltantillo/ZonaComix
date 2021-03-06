<?php
namespace ZonaComix\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="readings")
 */

class Reading
{
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="readings")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="Comic", inversedBy="readings")
     */
    protected $comic;

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", options={"unsigned"=true})
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
    /** @ORM\Column(type="datetime") */
    protected $update_date;
    /** @ORM\Column(type="integer", options={"unsigned"=true}) */
    protected $chapter = 1;
    /** @ORM\Column(type="integer", options={"unsigned"=true}) */
    protected $page    = 0;
    /** @ORM\Column(type="integer", options={"unsigned"=true}) */
    protected $panel   = 0;

    //Constructor
    public function __construct(){
        $this->update_date = new \DateTime(date('d-m-Y H:i:s', time()));
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
     * Set chapter
     *
     * @param integer $chapter
     * @return Readings
     */
    public function setChapter($chapter)
    {
        $this->chapter = $chapter;

        return $this;
    }

    /**
     * Get chapter
     *
     * @return integer 
     */
    public function getChapter()
    {
        return $this->chapter;
    }

    /**
     * Set page
     *
     * @param integer $page
     * @return Readings
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return integer 
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set panel
     *
     * @param integer $panel
     * @return Readings
     */
    public function setPanel($panel)
    {
        $this->panel = $panel;

        return $this;
    }

    /**
     * Get panel
     *
     * @return integer 
     */
    public function getPanel()
    {
        return $this->panel;
    }

    /**
     * Set user
     *
     * @param \ZonaComix\WebsiteBundle\Entity\User $user
     * @return Readings
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
     * Set comic
     *
     * @param \ZonaComix\WebsiteBundle\Entity\Comic $comic
     * @return Readings
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
     * Set update_date
     *
     * @param \DateTime $updateDate
     * @return Reading
     */
    public function setUpdateDate($updateDate)
    {
        $this->update_date = $updateDate;

        return $this;
    }

    /**
     * Get update_date
     *
     * @return \DateTime 
     */
    public function getUpdateDate()
    {
        return $this->update_date;
    }
}
