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

session_start();

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