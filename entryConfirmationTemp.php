<?php
require_once('database.php');
require_once('dbMethods.php');
if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
$currentUser = $_SESSION['user_logged'];
$foodName = filter_input(INPUT_POST, 'foodName');
$calories = filter_input(INPUT_POST, 'calories');
$protein = filter_input(INPUT_POST, 'protein');
$date = filter_input(INPUT_POST, 'date2');

$isValid = true;
if (!DateTime::createFromFormat('Y/m/d', $date)){
    $isValid = false;
    $dateError = "Invalid date, must enter a date with format (YYYY/MM/DD).";
}
if ($foodName === ''){
    $isValid = false;
    $foodNameError = 'Food name must not be empty';
}
if (!is_numeric($calories)){
    $isValid = false;
    $caloriesError = 'Calories must be numeric.';
}
if (!is_numeric($protein)){
    $isValid = false;
    $proteinError = 'Protein must be numeric.';
}
if ($isValid === false) {
    $foods = dbMethods::getAvailableFoods($currentUser);
    include('newFoodEntry.php');
    exit();
}
