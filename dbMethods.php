<?php

require_once('Database.php');
require_once('Food.php');
require_once('Log.php');

class dbMethods {

    public static function select_all() {
        $db = Database::getDB();

        $query = 'SELECT * FROM registration order by username';
        $statement = $db->prepare($query);
        $statement->execute();
        $users = $statement->fetchAll();
        return $users;
    }

    public static function addUser($user) {
        $db = Database::getDB();

        $username = $user->getUserName();
        $password = $user->getPassword();

        $query = 'INSERT INTO users(username, password) VALUES(:userName, :password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $username);
        $statement->bindValue(':password', $password);
        $success = $statement->execute();
        $statement->closeCursor();

        return $success;
    }
    
    public static function addEntry($username, $foodID, $date){
        $db = Database::getDB();

        $query = 'INSERT INTO loggedfoodentries(username, foodID, date) VALUES(:username, :foodID, :date)';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':foodID', $foodID);
        $statement->bindValue(':date', $date);
        $success = $statement->execute();
        $statement->closeCursor();

        return $success;
    }
    
    public static function addFood($foodName, $calories, $protein, $userNameAdded){
        $db = Database::getDB();
        
        $query = 'INSERT INTO foods(name, calories, protein, userNameAdded) VALUES (:foodName, :calories, :protein, :userNameAdded)';
        $statement = $db->prepare($query);
        $statement->bindValue(':foodName', $foodName);
        $statement->bindValue(':calories', $calories);
        $statement->bindValue(':protein', $protein);
        $statement->bindValue(':userNameAdded', $userNameAdded);
        $success = $statement->execute();
        $statement->closeCursor();

        return $success;
    }
    
    public static function getLog($username){
        $db = Database::getDB();

        $query =    'SELECT * from loggedfoodentries where username = :username order by date desc';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();

        $logs = array();
        foreach ($rows as $row) {
            $l = new Log(
                    $row['username'], $row['foodID'], $row['date'], $row['logID']);
            //$c->setCommentID($row['commentID']);
            $logs[] = $l;
        }
        return $logs;
    }
    
    public static function deleteLog($logID){
        $db = Database::getDB();
        
        $query = 'delete from loggedfoodentries where logID = :logID';
        $statement = $db->prepare($query);
        $statement->bindValue(':logID', $logID);
        $statement->execute();
        $success = $statement->execute();
        $statement->closeCursor();

        return $success;
    }
    
    public static function getAvailableFoods($username){
        $db = Database::getDB();

        $query =    'SELECT * from foods where userNameAdded = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();

        $foods = array();
        foreach ($rows as $row) {
            $f = new Food(
                    $row['name'], $row['calories'], $row['protein'], $row['userNameAdded'], $row['foodID']);
            //$c->setCommentID($row['commentID']);
            $foods[] = $f;
        }
        return $foods;
    }
    
    public static function getDefaultFoods($currentUser){
        $db = Database::getDB();

        $query =    'SELECT * from foods where userNameAdded = \'admin\' or userNameAdded = \'' . $currentUser . '\'';
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();

        $foods = array();
        foreach ($rows as $row) {
            $f = new Food(
                    $row['name'], $row['calories'], $row['protein'], $row['userNameAdded'], $row['foodID']);
            //$c->setCommentID($row['commentID']);
            $foods[] = $f;
        }
        return $foods;
    }
    
    public static function getFoodByID($foodID){
        $db = Database::getDB();

        $query =    'SELECT * from foods where foodID = :foodID';
        $statement = $db->prepare($query);
        $statement->bindValue(':foodID', $foodID);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $food = new Food($row['name'], $row['calories'], $row['protein'], $row['userNameAdded'], $row['foodID']);
        return $food;
    }

    public static function getUserByUserName($userName) {
        $db = Database::getDB();
        $query = 'SELECT * FROM users
                  WHERE userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $user = new User($row['username'], $row['password']);
        return $user;
    }

    public static function isUniqueUsername($field) {
        $db = Database::getDB();
        $query = 'SELECT UserName FROM users WHERE username = :field';
        $statement = $db->prepare($query);
        $statement->bindValue(':field', $field);
        $statement->execute();
        $existing = $statement->fetchAll();
        if ($existing === array()) {
            return true;
        } else {
            return false;
        }
    }
}
