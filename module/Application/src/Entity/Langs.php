<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Langs
 *
 * @ORM\Table(name="langs", indexes={@ORM\Index(name="id", columns={"id", "status"})})
 * @ORM\Entity
 */
class Langs
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
     * @ORM\Column(name="lang_code", type="string", length=50, nullable=false)
     */
    private $langCode;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=50, nullable=false)
     */
    private $icon;

    /**
     * @var int|null
     *
     * @ORM\Column(name="default", type="integer", nullable=true)
     */
    private $default;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="currency", type="string", length=50, nullable=true)
     */
    private $currency;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pos", type="integer", nullable=true)
     */
    private $pos = '0';



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
     * Set id.
     *
     * @param string $id
     *
     * @return Langs
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Set langCode.
     *
     * @param string $langCode
     *
     * @return Langs
     */
    public function setLangCode($langCode)
    {
        $this->langCode = $langCode;

        return $this;
    }

    /**
     * Get langCode.
     *
     * @return string
     */
    public function getLangCode()
    {
        return $this->langCode;
    }

    /**
     * Set icon.
     *
     * @param string $icon
     *
     * @return Langs
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon.
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set default.
     *
     * @param int|null $default
     *
     * @return Langs
     */
    public function setDefault($default = null)
    {
        $this->default = $default;

        return $this;
    }

    /**
     * Get default.
     *
     * @return int|null
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * Set status.
     *
     * @param int $status
     *
     * @return Langs
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set currency.
     *
     * @param string|null $currency
     *
     * @return Langs
     */
    public function setCurrency($currency = null)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency.
     *
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set pos.
     *
     * @param int|null $pos
     *
     * @return Langs
     */
    public function setPos($pos = null)
    {
        $this->pos = $pos;

        return $this;
    }

    /**
     * Get pos.
     *
     * @return int|null
     */
    public function getPos()
    {
        return $this->pos;
    }
}
