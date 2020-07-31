<?php
require_once('database.php');
require_once('dbMethods.php');

$userName = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

function isValidPass($password) {
    $counter = 0;
    $passwordError = "";
    if(!preg_match('/.{10,}/',$password)){
        $passwordError .= "Must be 10 characters long, ";
    }
    if ($password === ''){
        $passwordError .= 'Password field cannot be blank, ';
    }
    if(preg_match('/[A-Z]+/',$password)){
        $counter++;
    }
    if(preg_match('/[a-z]+/',$password)){
        $counter++;
    }
    if(preg_match('/[\d]+/',$password)){
        $counter++;
    }
    if(preg_match('/[!@#$%^&*;:,<.>]+/',$password)){
        $counter++;
    }
    if($counter > 2) {
        $passwordError .= "";
    }
    else {
        $passwordError .= "Must have 3 of the following Capital letters, lower case letters, numbers, and special characters";
    }
    return $passwordError;
}
$isValid = true;
if ($userName === '' || !preg_match('/^[a-zA-Z][a-zA-Z0-9]{3,31}$/',$userName)) {
    $isValid = false;
    $userNameError = 'User Name field cannot be blank';
    if(!preg_match('/^[a-zA-Z][a-zA-Z0-9]{3,31}$/',$userName)){
        $userNameError = 'User name must begin with a number and be between 4 and 30 characters';
    }
}
if (!dbMethods::isUniqueUsername($userName)) {
    $isValid = false;
    $userNameError = 'User Name must be unique';
}
if (isValidPass($password) != "") {
    $passwordError = isValidPass($password);
    $isValid = false;
}

if ($isValid === false) {
    include('registration.php');
    exit();
}
