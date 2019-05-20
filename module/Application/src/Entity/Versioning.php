<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Versioning
 *
 * @ORM\Table(name="versioning")
 * @ORM\Entity
 */
class Versioning
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
     * @ORM\Column(name="currentversion", type="string", length=10, nullable=true)
     */
    private $currentversion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="create_date", type="datetime", nullable=true)
     */
    private $createDate;



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
     * Set currentversion.
     *
     * @param string|null $currentversion
     *
     * @return Versioning
     */
    public function setCurrentversion($currentversion = null)
    {
        $this->currentversion = $currentversion;

        return $this;
    }

    /**
     * Get currentversion.
     *
     * @return string|null
     */
    public function getCurrentversion()
    {
        return $this->currentversion;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Versioning
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createDate.
     *
     * @param \DateTime|null $createDate
     *
     * @return Versioning
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
}
