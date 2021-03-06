<?php
/**
 * Dawn Baker
 * Capstone project
 * config file handles db, autoloader, session, errors the like
 */

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/env.php';

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


if(!empty($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    $_SESSION['flash'] = [];
} else {
    $flash = [];
}

// 
define('CLASSES', __DIR__ . '/classes');

// Define DB connection parameters
if(ENV === 'DEVELOPMENT') {
    define('DB_DSN', 'mysql:host=localhost;dbname=capstone');
    define('DB_USER', 'root');
    define('DB_PASS', '');
}

if(ENV === 'PRODUCTION') {
    define('DB_DSN', 'mysql:host=localhost;dbname=capstone');
    define('DB_USER', 'web_user');
    define('DB_PASS', 'Alice2018*');
}

// Connect to MySQL
// mysqli
// PDO
// resource/object
$dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
// Must set PDO to show errors, or it will fail silently
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require CLASSES . '/Model.php';

Capstone\Model::init($dbh);

require 'functions.php';

createCsrfToken();

if('POST' === $_SERVER['REQUEST_METHOD']) {
    if(empty($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']) {
        die('Fatal error! CSRF token mismatch!');
    }
}

isLoggedOut();