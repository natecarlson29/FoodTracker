<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author jn665423
 */
class Log {
    private $username, $foodID, $date, $logID;
    
    function __construct($username, $foodID, $date, $logID){
        $this->username = $username;
        $this->foodID = $foodID;
        $this->date = $date;
        $this->logID = $logID;
    }
    function getLogID() {
        return $this->logID;
    }

    function setLogID($logID) {
        $this->logID = $logID;
    }

        function getUsername() {
        return $this->username;
    }

    function getFoodID() {
        return $this->foodID;
    }

    function getDate() {
        return $this->date;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setFoodID($foodID) {
        $this->foodID = $foodID;
    }

    function setDate($date) {
        $this->date = $date;
    }



}
