<?php
/**
 * Dawn Baker
 * OO_PHP 
 * Assignment 2
 */

require __DIR__ . '/../../config.php';
require CLASSES . '/NeighborhoodModel.php';

use Capstone\NeighborhoodModel;



if('POST' !== $_SERVER['REQUEST_METHOD'] ){
    $flash = array(
        'class' => 'flash_error',
        'message' => 'Pick a neighborhood to edit.'
        );

        $_SESSION['flash'] = $flash;

        header('Location: /admin/neighborhoods.php');
        die;
}


// validation 
$v = new Capstone\Validator();
// neighborhood name validation 
$v->string($_POST['name'], 'name');
$v->minLen($_POST['name'], 'name', 2);
$v->maxLen($_POST['name'], 'name', 255);
// location validation
$v->string($_POST['location'], 'location');
$v->minLen($_POST['location'], 'location', 2);
$v->maxLen($_POST['location'], 'location', 45);
// description validation
$v->string($_POST['description'], 'description');
// image validation 
$v->minLen($_POST['img'], 'img', 2);
$v->maxLen($_POST['img'], 'img', 255);
// rating validation 
$v->isNumber($_POST['rating_scale'], 'rating_scale');
// school , church and playground validation 
$v->isNumber($_POST['prim_schools'], 'prim_schools');
$v->isNumber($_POST['sec_schools'], 'sec_schools');
$v->isNumber($_POST['churches'], 'churches');
$v->isNumber($_POST['playgrounds'], 'playgrounds');
// comm centre validation 
$v->string($_POST['name'], 'name');
$v->minLen($_POST['name'], 'name', 2);
$v->maxLen($_POST['name'], 'name', 255);
// house price validation
$v->isNumber($_POST['house_price_min'], 'house_price_min');
$v->isNumber($_POST['house_price_max'], 'house_price_max');


$errors = $v->errors();


// save errors into session array 
if(!empty($errors)){
    //add errors to the session
    $_SESSION['errors'] = $errors;
    $_SESSION['post'] = $_POST;
    // redirect back to neighborhood_edit page
    header('Location: /admin/neighborhood_edit.php');
    die;
}

$neighbhorhood = new NeighborhoodModel();

$affected_rows = $neighbhorhood->updateNeighborhood($_POST);


/**
 * if successful insert of record into the database, redirect back to the list view page with a message
 * or die with an error message
 */

if($affected_rows > 0){

    $flash = array(
        'class'=>'success',
        'message'=>'The record was updated'
    );
    $_SESSION['flash'] = $flash;

    
} else {
    $flash = array(
        'class' => 'flash_error',
        'message' => 'The record was not updated'
    );
    $_SESSION['flash'] = $flash;
}

header('Location: /admin/neighborhoods.php');
die;






