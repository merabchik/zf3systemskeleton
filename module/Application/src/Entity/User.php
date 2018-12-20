<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a registered user.
 * @ORM\Entity()
 * @ORM\Table(name="users")
 */
class User {

    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     *
     * @ORM\Column(name="user_type_id")
     */
    protected $user_type_id;

    /**
     * @ORM\Column(name="password")  
     */
    protected $password;

    /**
     * @ORM\Column(name="full_name")  
     */
    protected $fullName;

    /**
     * @ORM\Column(name="phone")  
     */
    protected $phone;

    /**
     * @ORM\Column(name="email")  
     */
    protected $email;


    /**
     * Returns user ID.
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Sets user ID. 
     * @param int $id    
     */
    public function setId($id) {
        $this->id = $id;
    }

    public function getUser_type_id() {
        return $this->user_type_id;
    }

    public function setUser_type_id($email) {
        $this->type = $user_type_id;
    }

    public function getFullName() {
        return $this->fullName;
    }

    public function setFullName($fullName) {
        $this->fullName = $fullName;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

}

/*
id
user_type_id
user_status_id
rating
avatar
full_name
phone
email
password
create_date
modify_date
regipaddr


 */