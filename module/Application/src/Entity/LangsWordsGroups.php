<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LangsWordsGroups
 *
 * @ORM\Table(name="langs_words_groups")
 * @ORM\Entity
 */
class LangsWordsGroups
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="module", type="string", length=255, nullable=true, options={"default"="main"})
     */
    private $module = 'main';

    /**
     * @var string|null
     *
     * @ORM\Column(name="controller", type="string", length=255, nullable=true, options={"default"="index"})
     */
    private $controller = 'index';

    /**
     * @var string|null
     *
     * @ORM\Column(name="action", type="string", length=255, nullable=true, options={"default"="index"})
     */
    private $action = 'index';



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
     * @param string|null $name
     *
     * @return LangsWordsGroups
     */
    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set module.
     *
     * @param string|null $module
     *
     * @return LangsWordsGroups
     */
    public function setModule($module = null)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module.
     *
     * @return string|null
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Set controller.
     *
     * @param string|null $controller
     *
     * @return LangsWordsGroups
     */
    public function setController($controller = null)
    {
        $this->controller = $controller;

        return $this;
    }

    /**
     * Get controller.
     *
     * @return string|null
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Set action.
     *
     * @param string|null $action
     *
     * @return LangsWordsGroups
     */
    public function setAction($action = null)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action.
     *
     * @return string|null
     */
    public function getAction()
    {
        return $this->action;
    }
}
