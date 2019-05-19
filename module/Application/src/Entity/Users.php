<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a registered user.
 * @ORM\Entity()
 * @ORM\Table(name="users")
 */
class Users {

    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(name="user_status_id")  
     */
    protected $user_status_id;

    /**
     *
     * @ORM\Column(name="user_gender_id") 
     */
    protected $user_gender_id;

    /**
     * @ORM\Column(name="full_name")  
     */
    protected $full_name;

    /**
     * @ORM\Column(name="phone")  
     */
    protected $phone;

    /**
     * @ORM\Column(name="email")  
     */
    protected $email;

    /**
     * @ORM\Column(name="password")  
     */
    protected $password;

    /**
     * @ORM\Column(name="create_date")
     */
    protected $create_date;

    /**
     * @ORM\Column(name="modify_date")
     */
    protected $modify_date;

    /**
     * @ORM\Column(name="regipaddr")
     */
    protected $regipaddr;

    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUserStatusId() {
        return $this->user_status_id;
    }

    public function setUserStatusId($user_status_id) {
        $this->user_status_id = $user_status_id;
    }

    public function getUserGenderId() {
        return $this->user_gender_id;
    }

    public function setUserGenderId($user_gender_id) {
        $this->user_gender_id = $user_gender_id;
    }

    public function getFullName() {
        return $this->full_name;
    }

    public function setFullName($full_name) {
        $this->full_name = $full_name;
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

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getCreateDate() {
        return $this->create_date;
    }

    public function setCreateDate($create_date) {
        $this->create_date = $create_date;
    }    

    public function getModifyDate() {
        return $this->modify_date;
    }

    public function setModifyDates($modify_date) {
        $this->modify_date = $modify_date;
    }

    public function getRegipaddr() {
        return $this->regipaddr;
    }

    public function setRegipaddr($regipaddr) {
        $this->regipaddr = $regipaddr;
    }

}