<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LangsWords
 *
 * @ORM\Table(name="langs_words", indexes={@ORM\Index(name="FK_language_langs", columns={"lang_id"})})
 * @ORM\Entity
 */
class LangsWords
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
     * @var int|null
     *
     * @ORM\Column(name="langs_words_group_id", type="integer", nullable=true, options={"default"="1"})
     */
    private $langsWordsGroupId = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="word", type="string", length=255, nullable=true)
     */
    private $word;

    /**
     * @var string|null
     *
     * @ORM\Column(name="define_word", type="string", length=100, nullable=true)
     */
    private $defineWord;

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
     * @var int
     *
     * @ORM\Column(name="lang_id", type="integer", nullable=false, options={"default"="1"})
     */
    private $lang_id;



    /**
     * Get id.
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Set langsWordsGroupId.
     *
     * @param int|null $langsWordsGroupId
     *
     * @return LangsWords
     */
    public function setLangsWordsGroupId($langsWordsGroupId = null) {
        $this->langsWordsGroupId = $langsWordsGroupId;
        return $this;
    }

    /**
     * Get langsWordsGroupId.
     *
     * @return int|null
     */
    public function getLangsWordsGroupId() {
        return $this->langsWordsGroupId;
    }

    /**
     * Set word.
     *
     * @param string|null $word
     * @return LangsWords
     */
    public function setWord($word = null) {
        $this->word = $word;
        return $this;
    }

    /**
     * Get word.
     *
     * @return string|null
     */
    public function getWord() {
        return $this->word;
    }

    /**
     * Set defineWord.
     *
     * @param string|null $defineWord
     *
     * @return LangsWords
     */
    public function setDefineWord($defineWord = null) {
        $this->defineWord = $defineWord;
        return $this;
    }

    /**
     * Get defineWord.
     *
     * @return string|null
     */
    public function getDefineWord() {
        return $this->defineWord;
    }

    /**
     * Set lang_id.
     *
     * @param string|null $lang_id
     * @return LangsWords
     */
    public function setLangId($LangId) {
        $this->lang_id = $LangId;
        return $this;
    }

    /**
     * Get lang_id.
     *
     * @return string|null
     */
    public function getLangId() {
        return $this->lang_id;
    }

    /**
     * Set lang.
     *
     * @param \Application\Entity\Langs|null $lang
     * @return LangsWords
     */
    public function setLang(\Application\Entity\Langs $lang = null) {
        $this->lang = $lang;
        return $this;
    }

    /**
     * Get lang.
     *
     * @return \Application\Entity\Langs|null
     */
    public function getLang() {
        return $this->lang;
    }
}
