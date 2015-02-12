<?php
namespace ZonaComix\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="revenue")
 */

class Revenue
{
    /**
     * @ORM\OneToOne(targetEntity="User", inversedBy="revenue")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", options={"unsigned"=true})
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	/** @ORM\Column(type="decimal", precision=10, scale=4) */
	protected $funds = 0;
	/** @ORM\Column(type="decimal", precision=10, scale=4) */
	protected $earnings = 0;
	/** @ORM\Column(type="decimal", precision=10, scale=4) */
	protected $deposits = 0;
	/** @ORM\Column(type="decimal", precision=10, scale=4) */
	protected $expenses = 0;
	/** @ORM\Column(type="decimal", precision=10, scale=4) */
	protected $withdrawals = 0;

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
     * Set funds
     *
     * @param string $funds
     * @return Revenue
     */
    public function setFunds($funds)
    {
        $this->funds = $funds;

        return $this;
    }

    /**
     * Get funds
     *
     * @return string 
     */
    public function getFunds()
    {
        return $this->funds;
    }

    /**
     * Set earnings
     *
     * @param string $earnings
     * @return Revenue
     */
    public function setEarnings($earnings)
    {
        $this->earnings = $earnings;

        return $this;
    }

    /**
     * Get earnings
     *
     * @return string 
     */
    public function getEarnings()
    {
        return $this->earnings;
    }

    /**
     * Set deposits
     *
     * @param string $deposits
     * @return Revenue
     */
    public function setDeposits($deposits)
    {
        $this->deposits = $deposits;

        return $this;
    }

    /**
     * Get deposits
     *
     * @return string 
     */
    public function getDeposits()
    {
        return $this->deposits;
    }

    /**
     * Set expenses
     *
     * @param string $expenses
     * @return Revenue
     */
    public function setExpenses($expenses)
    {
        $this->expenses = $expenses;

        return $this;
    }

    /**
     * Get expenses
     *
     * @return string 
     */
    public function getExpenses()
    {
        return $this->expenses;
    }

    /**
     * Set withdrawals
     *
     * @param string $withdrawals
     * @return Revenue
     */
    public function setWithdrawals($withdrawals)
    {
        $this->withdrawals = $withdrawals;

        return $this;
    }

    /**
     * Get withdrawals
     *
     * @return string 
     */
    public function getWithdrawals()
    {
        return $this->withdrawals;
    }

    /**
     * Set user
     *
     * @param \ZonaComix\WebsiteBundle\Entity\User $user
     * @return Revenue
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
}
