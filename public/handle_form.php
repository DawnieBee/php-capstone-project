<?php
/**
 * Handle form for register.php
 * Dawn Baker
 * Capstone Project
 * June 3 2020
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

//Field validations

/*--- Name validation ---*/ 

$v->isRequired($_POST['first_name'], 'first_name');
$v->string($_POST['first_name'], 'first_name');
$v->minLen($_POST['first_name'], 'first_name', 2);
$v->maxLen($_POST['first_name'], 'first_name', 255);

$v->isRequired($_POST['last_name'], 'last_name');
$v->string($_POST['last_name'], 'last_name');
$v->minLen($_POST['last_name'], 'last_name', 2);
$v->maxLen($_POST['last_name'], 'last_name', 255);

/*--- Email validation ---*/
$v->isRequired($_POST['email'], 'email');
$v->isEmail('email', $_POST['email']);

/*--- Phone Number validation ---*/
$v->isRequired($_POST['phone_number'], 'phone_number');
$v->isPhoneNum($_POST['phone_number'], 'phone_number');

/*--- Address validation ---*/
$v->isRequired($_POST['address'], 'address');

/*--- City validation ---*/
$v->isRequired($_POST['city'], 'city');
$v->string($_POST['city'], 'city');
$v->minLen($_POST['city'], 'city', 2);
$v->maxLen($_POST['city'], 'city', 255);


/*--- Province validation ---*/
$v->isRequired($_POST['province'], 'province');
$v->string($_POST['province'], 'province');
$v->minLen($_POST['province'], 'province', 2);
$v->maxLen($_POST['province'], 'province', 255);

/*--- Postal Code validation ---*/
$v->isRequired($_POST['postal_code'], 'postal_code');
$v->isPostalCode($_POST['postal_code'], 'postal_code');

/*--- Country validation ---*/
$v->isRequired($_POST['country'], 'country');
$v->string($_POST['country'], 'country');
$v->minLen($_POST['country'], 'country', 2);
$v->maxLen($_POST['country'], 'country', 255);

/*--- Password validation ---*/
$v->isRequired($_POST['password'], 'password');
$v->isPassword($_POST['password'], 'password');

/*--- Confirm Validation ---*/
$v->isRequired($_POST['confirm_password'], 'confirm_password');
$v->confirm('confirm_password', $_POST['password'], $_POST['confirm_password']);

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

// encrypt the password before entering into user's table
$encryptpass = password_hash($_POST['password'], PASSWORD_DEFAULT);

// all entered info is validated, now to create the record in the database for users table

// query used to insert into users table
$query = 'INSERT INTO users
            (first_name, last_name, email, phone_number, address, city, province, postal_code, country, password)
            VALUES 
            (:first_name, :last_name, :email, :phone_number, :address, :city, :province, :postal_code, :country, :password)';
$stmt = $dbh->prepare($query);
// binding the input to params 
$params = array(
    ':first_name' => $_POST['first_name'],
    ':last_name' => $_POST['last_name'],
    ':email' => $_POST['email'],
    ':phone_number' => $_POST['phone_number'],
    ':address' => $_POST['address'],
    ':city' => $_POST['city'],
    ':province' => $_POST['province'],
    ':postal_code' => $_POST['postal_code'],
    ':country' => $_POST['country'],
    ':password' => $encryptpass
);
// execute the query to database
$stmt->execute($params);

// redirect to success page 

$user_id = $dbh->lastInsertId();

/**
 * if successful insert of user, redirect to the profile page with the user_id in $_SESSION
 * or die.  give an error message if not successful 
 */
if($user_id > 0 ){
    $_SESSION['user_id'] = $user_id;

    $flash = array(
    'class'=> 'success',
    'message' => 'You have successfully signed up!'
    );

    $_SESSION['flash'] = $flash;

    header("Location: success.php");
    die;
}else{
    $flash = array(
        'class' => 'flash_error',
        'message' => 'There was a problem inserting the record'
    );
    $_SESSION['flash'] = $flash;

    header('Location: register.php');
    die;
}