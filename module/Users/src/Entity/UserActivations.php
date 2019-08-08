<?php

namespace Users\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserActivations
 *
 * @ORM\Table(name="user_activations", uniqueConstraints={@ORM\UniqueConstraint(name="code", columns={"code"})})
 * @ORM\Entity
 */
class UserActivations
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code", type="string", length=50, nullable=true)
     */
    private $code;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="activate_date", type="datetime", nullable=true)
     */
    private $activateDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="lifedate", type="datetime", nullable=true)
     */
    private $lifedate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="activated", type="integer", nullable=true)
     */
    private $activated = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ipaddr", type="string", length=50, nullable=true)
     */
    private $ipaddr;



    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userId.
     *
     * @param int|null $userId
     *
     * @return UserActivations
     */
    public function setUserId($userId = null)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId.
     *
     * @return int|null
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set code.
     *
     * @param string|null $code
     *
     * @return UserActivations
     */
    public function setCode($code = null)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code.
     *
     * @return string|null
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set activateDate.
     *
     * @param \DateTime|null $activateDate
     *
     * @return UserActivations
     */
    public function setActivateDate($activateDate = null)
    {
        $this->activateDate = $activateDate;

        return $this;
    }

    /**
     * Get activateDate.
     *
     * @return \DateTime|null
     */
    public function getActivateDate()
    {
        return $this->activateDate;
    }

    /**
     * Set lifedate.
     *
     * @param \DateTime|null $lifedate
     *
     * @return UserActivations
     */
    public function setLifedate($lifedate = null)
    {
        $this->lifedate = $lifedate;

        return $this;
    }

    /**
     * Get lifedate.
     *
     * @return \DateTime|null
     */
    public function getLifedate()
    {
        return $this->lifedate;
    }

    /**
     * Set activated.
     *
     * @param int|null $activated
     *
     * @return UserActivations
     */
    public function setActivated($activated = null)
    {
        $this->activated = $activated;

        return $this;
    }

    /**
     * Get activated.
     *
     * @return int|null
     */
    public function getActivated()
    {
        return $this->activated;
    }

    /**
     * Set ipaddr.
     *
     * @param string|null $ipaddr
     *
     * @return UserActivations
     */
    public function setIpaddr($ipaddr = null)
    {
        $this->ipaddr = $ipaddr;

        return $this;
    }

    /**
     * Get ipaddr.
     *
     * @return string|null
     */
    public function getIpaddr()
    {
        return $this->ipaddr;
    }
}
