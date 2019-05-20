<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageImages
 *
 * @ORM\Table(name="page_images", indexes={@ORM\Index(name="key_id", columns={"key_id"})})
 * @ORM\Entity
 */
class PageImages
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
     * @ORM\Column(name="filename", type="string", length=255, nullable=true)
     */
    private $filename;

    /**
     * @var int|null
     *
     * @ORM\Column(name="primary", type="integer", nullable=true)
     */
    private $primary = '0';

    /**
     * @var \Application\Entity\Pages
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Pages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="key_id", referencedColumnName="seq_id")
     * })
     */
    private $key;



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
     * Set filename.
     *
     * @param string|null $filename
     *
     * @return PageImages
     */
    public function setFilename($filename = null)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename.
     *
     * @return string|null
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set primary.
     *
     * @param int|null $primary
     *
     * @return PageImages
     */
    public function setPrimary($primary = null)
    {
        $this->primary = $primary;

        return $this;
    }

    /**
     * Get primary.
     *
     * @return int|null
     */
    public function getPrimary()
    {
        return $this->primary;
    }

    /**
     * Set key.
     *
     * @param \Application\Entity\Pages|null $key
     *
     * @return PageImages
     */
    public function setKey(\Application\Entity\Pages $key = null)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get key.
     *
     * @return \Application\Entity\Pages|null
     */
    public function getKey()
    {
        return $this->key;
    }
}
