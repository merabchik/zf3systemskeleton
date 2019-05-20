<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmailTemplates
 *
 * @ORM\Table(name="email_templates", indexes={@ORM\Index(name="list_email_template_type_id", columns={"list_email_template_type_id"})})
 * @ORM\Entity
 */
class EmailTemplates
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
     * @ORM\Column(name="template_name", type="string", length=255, nullable=true)
     */
    private $templateName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="template_body", type="text", length=0, nullable=true)
     */
    private $templateBody;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="add_date", type="datetime", nullable=true)
     */
    private $addDate;

    /**
     * @var \Application\Entity\ListEmailTemplateTypes
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\ListEmailTemplateTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="list_email_template_type_id", referencedColumnName="id")
     * })
     */
    private $listEmailTemplateType;



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
     * Set templateName.
     *
     * @param string|null $templateName
     *
     * @return EmailTemplates
     */
    public function setTemplateName($templateName = null)
    {
        $this->templateName = $templateName;

        return $this;
    }

    /**
     * Get templateName.
     *
     * @return string|null
     */
    public function getTemplateName()
    {
        return $this->templateName;
    }

    /**
     * Set templateBody.
     *
     * @param string|null $templateBody
     *
     * @return EmailTemplates
     */
    public function setTemplateBody($templateBody = null)
    {
        $this->templateBody = $templateBody;

        return $this;
    }

    /**
     * Get templateBody.
     *
     * @return string|null
     */
    public function getTemplateBody()
    {
        return $this->templateBody;
    }

    /**
     * Set addDate.
     *
     * @param \DateTime|null $addDate
     *
     * @return EmailTemplates
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
     * Set listEmailTemplateType.
     *
     * @param \Application\Entity\ListEmailTemplateTypes|null $listEmailTemplateType
     *
     * @return EmailTemplates
     */
    public function setListEmailTemplateType(\Application\Entity\ListEmailTemplateTypes $listEmailTemplateType = null)
    {
        $this->listEmailTemplateType = $listEmailTemplateType;

        return $this;
    }

    /**
     * Get listEmailTemplateType.
     *
     * @return \Application\Entity\ListEmailTemplateTypes|null
     */
    public function getListEmailTemplateType()
    {
        return $this->listEmailTemplateType;
    }
}
