<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmailConfig
 *
 * @ORM\Table(name="email_config")
 * @ORM\Entity
 */
class EmailConfig
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
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string|null
     *
     * @ORM\Column(name="params", type="text", length=255, nullable=true)
     */
    private $params;



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
     * Set address.
     *
     * @param string|null $address
     *
     * @return EmailConfig
     */
    public function setAddress($address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address.
     *
     * @return string|null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set params.
     *
     * @param string|null $params
     *
     * @return EmailConfig
     */
    public function setParams($params = null)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * Get params.
     *
     * @return string|null
     */
    public function getParams()
    {
        return $this->params;
    }
}
