<?php

namespace Backoffice\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a language table.
 * @ORM\Entity()
 * @ORM\Table(name="langs")
 */
class Langs {

    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     *
     * @ORM\Column(name="lang_code")
     */
    protected $lang_code;

    /**
     *
     * @ORM\Column(name="icon")
     */
    protected $icon;

    /**
     *
     * @ORM\Column(name="default")
     */
    protected $default;

    /**
     *
     * @ORM\Column(name="status")
     */
    protected $status;

    /**
     *
     * @ORM\Column(name="pos")
     */
    protected $pos;


    
    public function getID() {
        return $this->id;
    }
    
     public function getLangCode() {
        return $this->lang_code;
    }

    public function setLangCode($LangCode) {
        $this->lang_code = $LangCode;
    }
    
    public function getIcon() {
        return $this->icon;
    }

    public function setIcon($icon) {
        $this->icon = $icon;
    }
    
    public function getDefault() {
        return $this->default;
    }

    public function setDefault($default) {
        $this->default = $default;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getPos() {
        return $this->pos;
    }

    public function setPos($pos) {
        $this->pos = $pos;
    }

}