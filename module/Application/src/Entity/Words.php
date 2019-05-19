<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a registered user.
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
     * @ORM\Column(name="langs_words_group_id")  
     */
    protected $langs_words_group_id;

    /**
     *
     * @ORM\Column(name="word") 
     */
    protected $word;

    /**
     * @ORM\Column(name="define_word")  
     */
    protected $define_word;

    /**
     * @ORM\Column(name="lang_id")  
     */
    protected $lang_id;


    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getLangsWordsGroupId() {
        return $this->langs_words_group_id;
    }

    public function setLangsWordsGroupId($langs_words_group_id) {
        $this->langs_words_group_id = $langs_words_group_id;
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

    public function getLangId() {
        return $this->lang_id;
    }

    public function setLangId($lang_id) {
        $this->lang_id = $lang_id;
    }

}