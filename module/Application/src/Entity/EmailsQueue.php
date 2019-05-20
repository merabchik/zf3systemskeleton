<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmailsQueue
 *
 * @ORM\Table(name="emails_queue", indexes={@ORM\Index(name="template_id", columns={"template_id"}), @ORM\Index(name="executed", columns={"executed"})})
 * @ORM\Entity
 */
class EmailsQueue
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
     * @ORM\Column(name="to", type="string", length=100, nullable=true)
     */
    private $to;

    /**
     * @var string|null
     *
     * @ORM\Column(name="subject", type="text", length=65535, nullable=true)
     */
    private $subject;

    /**
     * @var string|null
     *
     * @ORM\Column(name="body", type="text", length=0, nullable=true)
     */
    private $body;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="add_date", type="datetime", nullable=true)
     */
    private $addDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="execute_date", type="datetime", nullable=true)
     */
    private $executeDate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="executed", type="integer", nullable=true)
     */
    private $executed = '0';

    /**
     * @var \Application\Entity\EmailTemplates
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\EmailTemplates")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="template_id", referencedColumnName="id")
     * })
     */
    private $template;



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
     * Set to.
     *
     * @param string|null $to
     *
     * @return EmailsQueue
     */
    public function setTo($to = null)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get to.
     *
     * @return string|null
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Set subject.
     *
     * @param string|null $subject
     *
     * @return EmailsQueue
     */
    public function setSubject($subject = null)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject.
     *
     * @return string|null
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set body.
     *
     * @param string|null $body
     *
     * @return EmailsQueue
     */
    public function setBody($body = null)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body.
     *
     * @return string|null
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set addDate.
     *
     * @param \DateTime|null $addDate
     *
     * @return EmailsQueue
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
     * Set executeDate.
     *
     * @param \DateTime|null $executeDate
     *
     * @return EmailsQueue
     */
    public function setExecuteDate($executeDate = null)
    {
        $this->executeDate = $executeDate;

        return $this;
    }

    /**
     * Get executeDate.
     *
     * @return \DateTime|null
     */
    public function getExecuteDate()
    {
        return $this->executeDate;
    }

    /**
     * Set executed.
     *
     * @param int|null $executed
     *
     * @return EmailsQueue
     */
    public function setExecuted($executed = null)
    {
        $this->executed = $executed;

        return $this;
    }

    /**
     * Get executed.
     *
     * @return int|null
     */
    public function getExecuted()
    {
        return $this->executed;
    }

    /**
     * Set template.
     *
     * @param \Application\Entity\EmailTemplates|null $template
     *
     * @return EmailsQueue
     */
    public function setTemplate(\Application\Entity\EmailTemplates $template = null)
    {
        $this->template = $template;

        return $this;
    }

    /**
     * Get template.
     *
     * @return \Application\Entity\EmailTemplates|null
     */
    public function getTemplate()
    {
        return $this->template;
    }
}
