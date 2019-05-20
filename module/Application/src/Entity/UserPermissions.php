<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserPermissions
 *
 * @ORM\Table(name="user_permissions", indexes={@ORM\Index(name="role_id", columns={"role_id"})})
 * @ORM\Entity
 */
class UserPermissions
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="controller", type="string", length=50, nullable=false)
     */
    private $controller;

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string", length=50, nullable=false)
     */
    private $action;

    /**
     * @var string|null
     *
     * @ORM\Column(name="op", type="string", length=50, nullable=true)
     */
    private $op;

    /**
     * @var \Application\Entity\UserRoles
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\UserRoles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     * })
     */
    private $role;



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
     * Set name.
     *
     * @param string $name
     *
     * @return UserPermissions
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set controller.
     *
     * @param string $controller
     *
     * @return UserPermissions
     */
    public function setController($controller)
    {
        $this->controller = $controller;

        return $this;
    }

    /**
     * Get controller.
     *
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Set action.
     *
     * @param string $action
     *
     * @return UserPermissions
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action.
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set op.
     *
     * @param string|null $op
     *
     * @return UserPermissions
     */
    public function setOp($op = null)
    {
        $this->op = $op;

        return $this;
    }

    /**
     * Get op.
     *
     * @return string|null
     */
    public function getOp()
    {
        return $this->op;
    }

    /**
     * Set role.
     *
     * @param \Application\Entity\UserRoles|null $role
     *
     * @return UserPermissions
     */
    public function setRole(\Application\Entity\UserRoles $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role.
     *
     * @return \Application\Entity\UserRoles|null
     */
    public function getRole()
    {
        return $this->role;
    }
}
