<?php
/**
 * Dawn Baker
 * Inter PHP
 *Assignment 1
 */
/*
* Handle Add User Form
 */
require __DIR__ . '/../config.php';

// confirm form data is a POST request or die 
if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Unsupported request method.');
}
// Validate fields 

$v = new Capstone\Validator();

// required fields validation 
$v->isRequired($_POST['first_name'], 'first_name');
$v->isRequired($_POST['last_name'], 'last_name');
$v->isRequired($_POST['email'], 'email');
$v->isRequired($_POST['phone_num'], 'phone_num');
$v->isRequired($_POST['address'], 'address');
$v->isRequired($_POST['city'], 'city');
$v->isRequired($_POST['prov'], 'prov');
$v->isRequired($_POST['post_code'], 'post_code');
$v->isRequired($_POST['country'], 'country');
$v->isRequired($_POST['password'], 'password');
$v->isRequired($_POST['confirm_password'], 'confirm_password');

$errors = $v->errors();

// saving errros into the $_SESSION array 
if(!empty($errors)) {
    // add the $errors to the SESSION
    $_SESSION['errors'] = $errors;
    $_SESSION['post'] = $_POST;
    // redirect back to contact page registration form
    header("Location: register.php");
    die;
}

dd($_POST);
die;

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