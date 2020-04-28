<?php
/**
 * Dawn Baker
 * Intro PHP
 *Assignment 2
 */
/*
* Handle Add User Form
 */

require __DIR__ . '/../config.php';


// confirm form data is a POST request or die 
if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Unsupported request method.');
}

// empty $errors array
$errors = [];

// name validators 
if(empty($_POST['first_name'])) {
    $errors['first_name'] = 'First Name is a required field';
} 
if(empty($_POST['last_name'])) {
    $errors['last_name'] = 'Last Name is a required field';
} 
// email validators to make sure is a valid email address 
if(empty($_POST['email'])) {
    $errors['email'] = 'Email is a required field';
} elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { 
    $errors['email'] = 'Email must be a valid email address';
}

if(empty($_POST['phone_num'])) {
    $errors['phone_num'] = 'Phone Number is a required field';
} 
if(empty($_POST['address'])) {
    $errors['address'] = 'Address is a required field';
} 
if(empty($_POST['city'])) {
    $errors['city'] = 'City is a required field';
} 
if(empty($_POST['prov'])) {
    $errors['prov'] = 'Province is a required field';
} 
if(empty($_POST['post_code'])) {
    $errors['post_code'] = 'Postal Code is a required field';
} 
if(empty($_POST['country'])) {
    $errors['country'] = 'Country is a required field';
} 
if(empty($_POST['password'])) {
    $errors['password'] = 'Password is a required field';
} 
if(empty($_POST['confirm_password'])) {
    $errors['confirm_password'] = 'Confirm Password is a required field';
} 


dd($errors);