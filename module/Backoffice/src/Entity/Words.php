<?php

namespace Backoffice\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a language table.
 * @ORM\Entity()
 * @ORM\Table(name="langs_words")
 */
class Words {

    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     *
     * @ORM\Column(name="word")
     */
    protected $word;

    /**
     *
     * @ORM\Column(name="define_word")
     */
    protected $define_word;

    /**
     *
     * @ORM\Column(name="lang_id")
     */
    protected $lang_id;

    /**
     * @ORM\ManyToOne(targetEntity="\Backoffice\Entity\Langs")
     * @ORM\JoinColumn(name="lang_id", referencedColumnName="id")
     */
    protected $lang;

    public function getID() {
        return $this->id;
    }

    public function getWord() {
        return $this->word;
    }

    public function setWord($word) {
        $this->word = $word;
    }

    public function getDefineWord() {
        return $this->define_word;
    }

    public function setDefineWord($define_word) {
        $this->define_word = $define_word;
    }

    public function getLangID() {
        return $this->lang_id;
    }

    public function setLangID($lang_id) {
        $this->lang_id = $lang_id;
    }

    public function getLang() {
        return $this->lang;
    }

    public function setLang($Lang) {
        $this->lang = $Lang;
    }

}