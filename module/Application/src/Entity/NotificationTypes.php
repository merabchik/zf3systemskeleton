<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NotificationTypes
 *
 * @ORM\Table(name="notification_types")
 * @ORM\Entity
 */
class NotificationTypes
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
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="formAction", type="string", length=100, nullable=true)
     */
    private $formaction;



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
     * Set title.
     *
     * @param string|null $title
     *
     * @return NotificationTypes
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
     * Set formaction.
     *
     * @param string|null $formaction
     *
     * @return NotificationTypes
     */
    public function setFormaction($formaction = null)
    {
        $this->formaction = $formaction;

        return $this;
    }

    /**
     * Get formaction.
     *
     * @return string|null
     */
    public function getFormaction()
    {
        return $this->formaction;
    }
}
