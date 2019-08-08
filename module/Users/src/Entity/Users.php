<?php

namespace Users\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"email"})}, indexes={@ORM\Index(name="user_status_id", columns={"user_status_id"})})
 * @ORM\Entity
 */
class Users
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
     * @ORM\Column(name="user_gender_id", type="integer", nullable=true, options={"default"="1","comment"="1=>კაცი, 2=>ქალი"})
     */
    private $userGenderId = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="full_name", type="string", length=255, nullable=true)
     */
    private $fullName;

    /**
     * @var int|null
     *
     * @ORM\Column(name="phone", type="integer", nullable=true)
     */
    private $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=true)
     */
    private $password;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="create_date", type="datetime", nullable=true)
     */
    private $createDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modify_date", type="datetime", nullable=true)
     */
    private $modifyDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="regipaddr", type="string", length=50, nullable=true)
     */
    private $regipaddr;

    /**
     * @var \Application\Entity\UserStatuses
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\UserStatuses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_status_id", referencedColumnName="id")
     * })
     */
    private $userStatus;



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
     * Set userGenderId.
     *
     * @param int|null $userGenderId
     *
     * @return Users
     */
    public function setUserGenderId($userGenderId = null)
    {
        $this->userGenderId = $userGenderId;

        return $this;
    }

    /**
     * Get userGenderId.
     *
     * @return int|null
     */
    public function getUserGenderId()
    {
        return $this->userGenderId;
    }

    /**
     * Set fullName.
     *
     * @param string|null $fullName
     *
     * @return Users
     */
    public function setFullName($fullName = null)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName.
     *
     * @return string|null
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set phone.
     *
     * @param int|null $phone
     *
     * @return Users
     */
    public function setPhone($phone = null)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone.
     *
     * @return int|null
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email.
     *
     * @param string|null $email
     *
     * @return Users
     */
    public function setEmail($email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password.
     *
     * @param string|null $password
     *
     * @return Users
     */
    public function setPassword($password = null)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string|null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set createDate.
     *
     * @param \DateTime|null $createDate
     *
     * @return Users
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
     * Set modifyDate.
     *
     * @param \DateTime|null $modifyDate
     *
     * @return Users
     */
    public function setModifyDate($modifyDate = null)
    {
        $this->modifyDate = $modifyDate;

        return $this;
    }

    /**
     * Get modifyDate.
     *
     * @return \DateTime|null
     */
    public function getModifyDate()
    {
        return $this->modifyDate;
    }

    /**
     * Set regipaddr.
     *
     * @param string|null $regipaddr
     *
     * @return Users
     */
    public function setRegipaddr($regipaddr = null)
    {
        $this->regipaddr = $regipaddr;

        return $this;
    }

    /**
     * Get regipaddr.
     *
     * @return string|null
     */
    public function getRegipaddr()
    {
        return $this->regipaddr;
    }

    /**
     * Set userStatus.
     *
     * @param \Application\Entity\UserStatuses|null $userStatus
     *
     * @return Users
     */
    public function setUserStatus(\Application\Entity\UserStatuses $userStatus = null)
    {
        $this->userStatus = $userStatus;

        return $this;
    }

    /**
     * Get userStatus.
     *
     * @return \Application\Entity\UserStatuses|null
     */
    public function getUserStatus()
    {
        return $this->userStatus;
    }
}
