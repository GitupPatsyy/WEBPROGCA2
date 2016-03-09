<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author rorypb
 */

class User {

    //Paramters for the user
    private $id; //ID to distinguish which user belongs to which username and password
    private $username; //name for user to login with
    private $password; //password for secure login
    private $role; //For storing buses or driving

    //Default constructor

    public function __construct($i, $un, $pw, $r) {
        $this->id = $i;
        $this->username = $un;
        $this->password = $pw;
        $this->role = $r;
    }

    //Get id function
    public function getID() {
        return $this->id;
    }

    //Get username function
    public function getUsername() {
        return $this->username;
    }

    //Get password function
    public function getPassword() {
        return $this->password;
    }

    //Get function function
    public function getRole() {
        return $this->role;
    }
    
    //set ID function
    public function setID($i) {
        return $this->id = $i;
    }
    
    //Set username function
    public function setUsername($n) {
        return $this->username = $n;
    }
    
    //Set PAssword function
    public function setPassword($p){
        return $this->password = $p;
        
    }
    
    //Set Role Funcion
    public function setRole($r) {
        return $this->role = $r;
    }
}
?>
