<?php
/**
 * Dawn Baker
 * OO_PHP 
 * Assignment 2
 */

require __DIR__ . '/../../config.php';
require CLASSES . '/NeighborhoodModel.php';

use Capstone\NeighborhoodModel;

$neighbhorhood = new NeighborhoodModel();



if('POST' !== $_SERVER['REQUEST_METHOD'] ){
    die('Unsupported request method');
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
    header('Location: neighborhood_edit.php');
    die;
}
if(empty($errors)){
    $result = $neighbhorhood->updateNeighborhood();

    header('Location: neighborhoods.php');
    die;
}

// 

$update = $dbh->lastInsertId();

if($update > 0){
    $_SESSION['hood_id'] = $update;

    $flash = array(
        'class'=>'success',
        'message'=>'Update successful'
    );
    $_SESSION['flash'] = $flash;

    header('Location: neighborhoods.php');
    die;
} else {
        $flash = array(
            'class' => 'flash_error',
            'message' => 'There was a problem inserting the record'
        );
        $_SESSION['flash'] = $flash;

        header('Location: neighborhood_edit.php');
        die;
}



