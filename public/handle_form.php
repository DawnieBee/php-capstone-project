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
// function for required fields
isRequired('first_name', $_POST['first_name']);
isRequired('last_name', $_POST['last_name']);
isRequired('email', $_POST['email']);
isRequired('phone_num', $_POST['phone_num']);
isRequired('address', $_POST['address']);
isRequired('city', $_POST['city']);
isRequired('prov', $_POST['prov']);
isRequired('post_code', $_POST['post_code']);
isRequired('country', $_POST['country']);
isRequired('password', $_POST['password']);
isRequired('confirm_password', $_POST['confirm_password']);


/*
if(strlen($_POST['first_name']) < 2) {
    $errors['first_name'] = 'First Name must have at least 2 characters';
} elseif(strlen($_POST['first_name']) > 255) {
    $errors['first_name'] = 'First Name must have maximum of 255 characters';
}
if(strlen($_POST['last_name']) < 2) {
    $errors['last_name'] = 'Last Name must have at least 2 characters';
} elseif(strlen($_POST['last_name']) > 255) {
    $errors['last_name'] = 'Last Name must have maximum of 255 characters';
}
// email validators to make sure is a valid email address 
if($_POST['email'] !== filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { 
    $errors['email'] = 'Email must be a valid email address';
}
// phone # validators to make sure at least 10 digits with area code 
if(!is_numeric($_POST['phone_num'])) {
    $errors['phone_num'] = 'Phone Number must be numeric, no dashes or spaces';
} elseif(strlen($_POST['phone_num']) < 10) {
    $errors['phone_num'] = 'Phone Number must include area code';
}
if($_POST['confirm_password'] !==$_POST['password']) {
    $errors['confirm_password'] = 'Passwords do not match';
}
*/
// saving errros into the $_SESSION array 
if(!empty($errors)) {
    // add the $errors to the SESSION
    $_SESSION['errors'] = $errors;
    $_SESSION['post'] = $_POST;
    // redirect back to contact page registration form
    header("Location: register.php");
    die;
}

// all entered info is validated, now to create the record in the database for users table

// query used to insert into users table
$query = 'INSERT INTO users
            (first_name, last_name, email, phone_num, address, city, prov, post_code, country, password)
            VALUES 
            (:first_name, :last_name, :email, :phone_num, :address, :city, :prov, :post_code, :country, :password)';
$stmt = $dbh->prepare($query);
// binding the input to params 
$params = array(
    ':first_name' => $_POST['first_name'],
    ':last_name' => $_POST['last_name'],
    ':email' => $_POST['email'],
    ':phone_num' => $_POST['phone_num'],
    ':address' => $_POST['address'],
    ':city' => $_POST['city'],
    ':prov' => $_POST['prov'],
    ':post_code' => $_POST['post_code'],
    ':country' => $_POST['country'],
    ':password' => $_POST['password']
);
// execute the query to database
$stmt->execute($params);

// redirect to success page 

$user_id = $dbh->lastInsertId();
dd($user_id);
/**
 * if successful insert of user, redirect to the profile page with the user_id in $_SESSION
 * or die.  give an error message if not successful 
 */
if($user_id > 0) {
    $_SESSION['user_id'] = $user_id;
    header('Location: profile.php');
        die;
} else {
    die('Unable to create new user');
}