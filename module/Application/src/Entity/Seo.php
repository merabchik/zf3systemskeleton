<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seo
 *
 * @ORM\Table(name="seo", indexes={@ORM\Index(name="lang_id", columns={"lang_id"})})
 * @ORM\Entity
 */
class Seo
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
     * @ORM\Column(name="controller", type="string", length=100, nullable=false, options={"default"="index"})
     */
    private $controller = 'index';

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string", length=100, nullable=false, options={"default"="index"})
     */
    private $action = 'index';

    /**
     * @var string|null
     *
     * @ORM\Column(name="keywords", type="string", length=255, nullable=true)
     */
    private $keywords;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descriptions", type="text", length=65535, nullable=true)
     */
    private $descriptions;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var \Application\Entity\Langs
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Langs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lang_id", referencedColumnName="id")
     * })
     */
    private $lang;



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
     * Set controller.
     *
     * @param string $controller
     *
     * @return Seo
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
     * @return Seo
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
     * Set keywords.
     *
     * @param string|null $keywords
     *
     * @return Seo
     */
    public function setKeywords($keywords = null)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords.
     *
     * @return string|null
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set descriptions.
     *
     * @param string|null $descriptions
     *
     * @return Seo
     */
    public function setDescriptions($descriptions = null)
    {
        $this->descriptions = $descriptions;

        return $this;
    }

    /**
     * Get descriptions.
     *
     * @return string|null
     */
    public function getDescriptions()
    {
        return $this->descriptions;
    }

    /**
     * Set title.
     *
     * @param string|null $title
     *
     * @return Seo
     */
    public function setTitle($title = null)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set lang.
     *
     * @param \Application\Entity\Langs|null $lang
     *
     * @return Seo
     */
    public function setLang(\Application\Entity\Langs $lang = null)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get lang.
     *
     * @return \Application\Entity\Langs|null
     */
    public function getLang()
    {
        return $this->lang;
    }
}
