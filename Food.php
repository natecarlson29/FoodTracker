<?php

class Food {
    private $name, $calories, $protein, $userNameAdded, $foodID;
    
    function __construct($name, $calories, $protein, $userNameAdded, $foodID) {
        $this->name = $name;
        $this->calories = $calories;
        $this->protein = $protein;
        $this->userNameAdded = $userNameAdded;
        $this->foodID = $foodID;
    }
    
    function getFoodID() {
        return $this->foodID;
    }
    
    function getName() {
        return $this->name;
    }

    function getCalories() {
        return $this->calories;
    }

    function getProtein() {
        return $this->protein;
    }

    function getUserNameAdded() {
        return $this->userNameAdded;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setCalories($calories) {
        $this->calories = $calories;
    }

    function setProtein($protein) {
        $this->protein = $protein;
    }

    function setUserNameAdded($userNameAdded) {
        $this->userNameAdded = $userNameAdded;
    }
    
    function setFoodID($foodID) {
        $this->foodID = $foodID;
    }



}
