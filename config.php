<?php
/* 
 * Dawn Baker            
 * Intro PHP             
 * Assignment 1          
 */

// start a session 
// this allows us to save data and access it on another page IF that 
// page has loaded this config file
session_start();

// Form submission 
// If there are errors, get them out an assign them to a simple variable named errors,
if(isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    // clearing old errors from the session
    $_SESSION['errors'] = [];
} else {
    $errors = [];
}
// If there are post values, get them out so we can use them easily 
if(isset($_SESSION['post'])) {
    $post = $_SESSION['post'];
    // clearing old post values from the session
    $_SESSION['post'] = [];
} else {
    $post = [];
}

// Clear

// Once this file is loaded, our porgram will have access to all the following constants 
// Constant is a value that cannot be changed after it is set 
// define the constant GST, set it's value to 0.5
define('GST', 0.5);

// define DB connection parameters
define('DB_USER', 'web_user');
define('DB_PASS', 'mypass');



require 'functions.php';
