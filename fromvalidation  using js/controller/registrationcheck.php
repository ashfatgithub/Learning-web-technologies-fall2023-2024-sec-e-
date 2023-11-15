<?php
session_start();
require_once("../model/usersmodel.php");
require_once("validation.php"); // Include your validation functions file

$errors = array();

$name = $_REQUEST['name'];
$username = $_REQUEST['usrname']; // fix the field name
$email = $_REQUEST['email'];
$mobile = $_REQUEST['mobile'];
$gender = (isset($_REQUEST['gender'])) ? $_REQUEST['gender'] : '';
$id = $_REQUEST['id'];
$password = $_REQUEST['password'];
$cpassword = $_REQUEST['cpassword'];

if (!isValidName($name)) {
    $errors[] = 'Invalid name.';
}

if (!isValidUsername($username)) {
    $errors[] = 'Invalid username.';
}

if (!isValidEmail($email)) {
    $errors[] = 'Invalid email address.';
}

if (!isValidPhone($mobile)) {
    $errors[] = 'Invalid phone number.';
}
if (!isValidGender($gender)) {
    $errors[] = 'Invalid gender.';
}

if (!isValidPassword($password)) {
    $errors[] = 'Invalid password.';
}
if (!isValidID($id)) {
    $errors[] = 'Invalid ID. It should contain only numeric characters.';
}

if (!isValidConfirmPassword($password, $cpassword)) {
    $errors[] = 'Passwords do not match.';
}

if (!empty($errors)) {
    // Display validation errors on the same page
    foreach ($errors as $error) {
        echo $error . '<br>';
    }
} else {
    $status = registration($name, $username, $email, $mobile, $gender, $id, $password);
    if ($status) {
        header('location:../view/login.php');
    } else {
        echo 'Registration failed. The chosen ID is already taken. Please choose a different one.';
    }
}
?>
