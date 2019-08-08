<?php

namespace Users\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserSessions
 *
 * @ORM\Table(name="user_sessions", uniqueConstraints={@ORM\UniqueConstraint(name="sesskey", columns={"token"})}, indexes={@ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 */
class UserSessions
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
     * @var string|null
     *
     * @ORM\Column(name="token", type="string", length=50, nullable=true)
     */
    private $token;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ipaddr", type="string", length=50, nullable=true)
     */
    private $ipaddr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="client_info", type="text", length=65535, nullable=true)
     */
    private $clientInfo;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="create_date", type="datetime", nullable=true)
     */
    private $createDate;

    /**
     * @var \Application\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



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
     * Set token.
     *
     * @param string|null $token
     *
     * @return UserSessions
     */
    public function setToken($token = null)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token.
     *
     * @return string|null
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set ipaddr.
     *
     * @param string|null $ipaddr
     *
     * @return UserSessions
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

    /**
     * Set clientInfo.
     *
     * @param string|null $clientInfo
     *
     * @return UserSessions
     */
    public function setClientInfo($clientInfo = null)
    {
        $this->clientInfo = $clientInfo;

        return $this;
    }

    /**
     * Get clientInfo.
     *
     * @return string|null
     */
    public function getClientInfo()
    {
        return $this->clientInfo;
    }

    /**
     * Set createDate.
     *
     * @param \DateTime|null $createDate
     *
     * @return UserSessions
     */
    public function setCreateDate($createDate = null)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * Get createDate.
     *
     * @return \DateTime|null
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Set user.
     *
     * @param \Application\Entity\Users|null $user
     *
     * @return UserSessions
     */
    public function setUser(\Users\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \Application\Entity\Users|null
     */
    public function getUser()
    {
        return $this->user;
    }
}
