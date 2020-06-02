<?php
/**
 * functions to edit a neighborhood for Admin site
 * basically the handle form for neighborhood edit
 * June 1, 2020
 * by Dawn Baker
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

// all fields are required
$v->isRequired($_POST['name'], 'name');
$v->isRequired($_POST['location'], 'location');
$v->isRequired($_POST['description'], 'description');
$v->isRequired($_POST['img'], 'img');
$v->isRequired($_POST['rating_scale'], 'rating_scale');
$v->isRequired($_POST['police_station'], 'police_station');
$v->isRequired($_POST['fire_station'], 'fire_station');
$v->isRequired($_POST['library'], 'library');
$v->isRequired($_POST['pool'], 'pool');
$v->isRequired($_POST['prim_schools'], 'prim_schools');
$v->isRequired($_POST['sec_schools'], 'sec_schools');
$v->isRequired($_POST['churches'], 'churches');
$v->isRequired($_POST['playgrounds'], 'playgrounds');
$v->isRequired($_POST['comm_centres'], 'comm_centres');
$v->isRequired($_POST['house_price_min'], 'house_price_min');
$v->isRequired($_POST['house_price_max'], 'house_price_max');
// neighborhood name validation 
$v->string($_POST['name'], 'name');
$v->minLen($_POST['name'], 'name', 2);
$v->maxLen($_POST['name'], 'name', 255);
// location validation
$v->string($_POST['location'], 'location');
$v->minLen($_POST['location'], 'location', 2);
$v->maxLen($_POST['location'], 'location', 45);
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
        'message' => 'No records were updated'
    );
    $_SESSION['flash'] = $flash;

}

header('Location: /admin/neighborhoods.php');
die;






