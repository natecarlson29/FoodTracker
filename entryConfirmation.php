<?php
require_once('database.php');
require_once('dbMethods.php');
if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
$currentUser = $_SESSION['user_logged'];
$foodID = filter_input(INPUT_POST, 'foodEaten');
$date = filter_input(INPUT_POST, 'date');

$isValid = true;
if (!DateTime::createFromFormat('Y/m/d', $date)){
    $isValid = false;
    $dateError = "Invalid date, must enter a date with format (YYYY/MM/DD).";
}
if ($isValid === false) {
    $foods = dbMethods::getAvailableFoods($currentUser);
    include('newFoodEntry.php');
    exit();
}
