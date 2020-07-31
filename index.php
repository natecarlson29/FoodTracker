<?php

//CSS styling update
//need to either make login/register only appear when a user isnt logged in and logout appear if a user is loogged in
//or alternative is to make login/logout a single button

require_once('database.php');
require_once('dbMethods.php');
require_once('User.php');

session_start();

if (!isset($_SESSION['user_logged'])) {
    $_SESSION['user_logged'] = '';
}

$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == null) {
        $action = 'gotoLogin';
    }
}
function xssafe($data,$encoding='UTF-8')

{

   return htmlspecialchars($data,ENT_QUOTES | ENT_HTML401,$encoding);

}

function xecho($data)

{

   echo xssafe($data);

}

switch ($action) {
    case 'gotoRegistration':
        include 'registration.php';
        die();
        break;
    case 'gotoNewFoodEntry':
        $currentUser = $_SESSION['user_logged'];
        $foods = dbMethods::getDefaultFoods($currentUser);
        include 'newFoodEntry.php';
        die();
        break;
    case 'gotoLogin':
        $_SESSION['user_logged'] = '';
        include 'login.php';
        die();
        break;
    case 'gotoAddNewFood':
        include 'addNewFood.php';
        die();
        break;
    case 'gotoHome':
        $currentUser = $_SESSION['user_logged'];
        $logs = dbMethods::getLog($currentUser);
        include 'home.php';
        die();
        break;
    case 'deleteLog':
        $logsID = filter_input(INPUT_POST, 'logsID');
        dbMethods::deleteLog($logsID);
        $currentUser = $_SESSION['user_logged'];
        $logs = dbMethods::getLog($currentUser);
        include 'home.php';
        die();
        break;
    case 'addEntry':
        include('entryConfirmation.php');
        $currentUser = $_SESSION['user_logged'];
        dbMethods::addEntry($currentUser, $foodID, $date);
        $logs = dbMethods::getLog($currentUser);
        include('home.php');
        die();
        break;
    case 'addTempFood':
        include('entryConfirmationTemp.php');
        $currentUser = $_SESSION['user_logged'];
        dbMethods::addFood($foodName, $calories, $protein, $currentUser);
        $foods = dbMethods::getAvailableFoods($currentUser);
        $foodID = end($foods)->getFoodID();
        dbMethods::addEntry($currentUser, $foodID, $date);
        $logs = dbMethods::getLog($currentUser);
        include('home.php');
        die();
        break;
    case 'addFood':
        include('foodConfirmation.php');
        $currentUser = $_SESSION['user_logged'];
        dbMethods::addFood($foodName, $calories, $protein, $currentUser);
        $logs = dbMethods::getLog($currentUser);
        $foods = dbMethods::getDefaultFoods($currentUser);
        include 'newFoodEntry.php';
        die();
        break;
    case 'addUser':
        include('confirmation.php');
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $options = [
            //DO set a cost factor, experiment to find a number that is sufficiently high but doesn't kill your performance
            'cost' => 12
                //DON'T supply your own salt like this, let password_hash do that for you
                //'salt' => "notgoodnotgoodnotgoodnotgoodnotgood",
        ];
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);
        $user = new User($username, $hashedPassword);
        dbMethods::addUser($user);
        $_SESSION['user_logged'] = $username;
        $logs = dbMethods::getLog($username);
        include('home.php');
        die();
        break;
    case 'login':
        include('loginConfirmation.php');
        $currentUser = $_SESSION['user_logged'];
        $logs = dbMethods::getLog($currentUser);
        include('home.php');
        die();
        break;
}
