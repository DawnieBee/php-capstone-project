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

$v = new Capstone\Validator();

$errors = [];

// required fields validation 





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