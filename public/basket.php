<?php
/**
 * processing page for customer to add to basket
 * Dawn Baker 
 * June 3 2020 
 * Capstone project
 */
require __DIR__ . '/../config.php';

//coming here from the area_detail page 
// is there a hood_id? if not die and continue
if(empty($_POST['hood_id'])) {
    die('Error connecting to page');
}

require CLASSES . '/NeighborhoodModel.php';

use Capstone\NeighborhoodModel;

$model = new NeighborhoodModel();

// hood_id is chosen
$neighborhood = $model->one($_POST['hood_id']);


// item array for basket
// hood_id
// name
// location
// rating
$item = array(
    'hood_id' => $neighborhood['hood_id'],
    'name' => $neighborhood['name'],
    'location' => $neighborhood['location'],
    'rating_scale' => $neighborhood['rating_scale']
);


// success message if neighborhood retrieved from database or error message flash
if(is_array($neighborhood)){ 

    $flash = array(
        'class'=>'success',
        'message'=>'The item has been added to your basket.'
    );  
} else {
    $flash = array(
        'class' => 'flash_error',
        'message' => 'Unable to add itemto your basket'
    );
}

$_SESSION['flash'] = $flash; 

// add item to basket 
$_SESSION['basket'][ $neighborhood['hood_id'] ] = $item;

// send user back where he started 
header('Location: ' . $_SERVER['HTTP_REFERER']);
die; 
