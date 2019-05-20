<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pages
 *
 * @ORM\Table(name="pages", indexes={@ORM\Index(name="seq_id", columns={"seq_id"}), @ORM\Index(name="lang_id", columns={"lang_id"})})
 * @ORM\Entity
 */
class Pages
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
     * @var int
     *
     * @ORM\Column(name="seq_id", type="integer", nullable=false)
     */
    private $seqId;

    /**
     * @var int
     *
     * @ORM\Column(name="lang_id", type="integer", nullable=false)
     */
    private $langId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="content", type="text", length=0, nullable=true)
     */
    private $content;

    /**
     * @var string|null
     *
     * @ORM\Column(name="meta_keywords", type="text", length=65535, nullable=true)
     */
    private $metaKeywords;

    /**
     * @var string|null
     *
     * @ORM\Column(name="meta_description", type="text", length=65535, nullable=true)
     */
    private $metaDescription;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="create_date", type="datetime", nullable=true)
     */
    private $createDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modify_date", type="datetime", nullable=true)
     */
    private $modifyDate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="modifier_id", type="integer", nullable=true)
     */
    private $modifierId;



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
     * Set seqId.
     *
     * @param int $seqId
     *
     * @return Pages
     */
    public function setSeqId($seqId)
    {
        $this->seqId = $seqId;

        return $this;
    }

    /**
     * Get seqId.
     *
     * @return int
     */
    public function getSeqId()
    {
        return $this->seqId;
    }

    /**
     * Set langId.
     *
     * @param int $langId
     *
     * @return Pages
     */
    public function setLangId($langId)
    {
        $this->langId = $langId;

        return $this;
    }

    /**
     * Get langId.
     *
     * @return int
     */
    public function getLangId()
    {
        return $this->langId;
    }

    /**
     * Set title.
     *
     * @param string|null $title
     *
     * @return Pages
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
     * Set content.
     *
     * @param string|null $content
     *
     * @return Pages
     */
    public function setContent($content = null)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content.
     *
     * @return string|null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set metaKeywords.
     *
     * @param string|null $metaKeywords
     *
     * @return Pages
     */
    public function setMetaKeywords($metaKeywords = null)
    {
        $this->metaKeywords = $metaKeywords;

        return $this;
    }

    /**
     * Get metaKeywords.
     *
     * @return string|null
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * Set metaDescription.
     *
     * @param string|null $metaDescription
     *
     * @return Pages
     */
    public function setMetaDescription($metaDescription = null)
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * Get metaDescription.
     *
     * @return string|null
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * Set createDate.
     *
     * @param \DateTime|null $createDate
     *
     * @return Pages
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

    /**
     * Set modifyDate.
     *
     * @param \DateTime|null $modifyDate
     *
     * @return Pages
     */
    public function setModifyDate($modifyDate = null)
    {
        $this->modifyDate = $modifyDate;

        return $this;
    }

    /**
     * Get modifyDate.
     *
     * @return \DateTime|null
     */
    public function getModifyDate()
    {
        return $this->modifyDate;
    }

    /**
     * Set modifierId.
     *
     * @param int|null $modifierId
     *
     * @return Pages
     */
    public function setModifierId($modifierId = null)
    {
        $this->modifierId = $modifierId;

        return $this;
    }

    /**
     * Get modifierId.
     *
     * @return int|null
     */
    public function getModifierId()
    {
        return $this->modifierId;
    }
}
