<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Logs
 *
 * @ORM\Table(name="logs")
 * @ORM\Entity
 */
class Logs
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
     * @ORM\Column(name="fu_name", type="string", length=255, nullable=true, options={"default"="undefine"})
     */
    private $fuName = 'undefine';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ipaddr", type="string", length=255, nullable=true)
     */
    private $ipaddr;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="add_date", type="datetime", nullable=true)
     */
    private $addDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="log", type="text", length=0, nullable=true)
     */
    private $log;



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
     * Set fuName.
     *
     * @param string|null $fuName
     *
     * @return Logs
     */
    public function setFuName($fuName = null)
    {
        $this->fuName = $fuName;

        return $this;
    }

    /**
     * Get fuName.
     *
     * @return string|null
     */
    public function getFuName()
    {
        return $this->fuName;
    }

    /**
     * Set ipaddr.
     *
     * @param string|null $ipaddr
     *
     * @return Logs
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
     * Set addDate.
     *
     * @param \DateTime|null $addDate
     *
     * @return Logs
     */
    public function setAddDate($addDate = null)
    {
        $this->addDate = $addDate;

        return $this;
    }

    /**
     * Get addDate.
     *
     * @return \DateTime|null
     */
    public function getAddDate()
    {
        return $this->addDate;
    }

    /**
     * Set log.
     *
     * @param string|null $log
     *
     * @return Logs
     */
    public function setLog($log = null)
    {
        $this->log = $log;

        return $this;
    }

    /**
     * Get log.
     *
     * @return string|null
     */
    public function getLog()
    {
        return $this->log;
    }
}
