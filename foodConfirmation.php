<?php
require_once('database.php');
require_once('dbMethods.php');

$foodName = filter_input(INPUT_POST, 'foodName');
$calories = filter_input(INPUT_POST, 'calories');
$protein = filter_input(INPUT_POST, 'protein');

$isValid = true;
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
    include('addNewFood.php');
    exit();
}
