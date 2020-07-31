<?php

class User {
    private $userName, $password;
    
    function __construct($username, $password) {
        $this->userName = $username;
        $this->password = $password;
    }

    function getUserName() {
        return $this->userName;
    }

    function getPassword() {
        return $this->password;
    }

    function setUserName($username) {
        $this->userName = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

}
