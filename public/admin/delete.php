<?php
/**
 * Delete a Neigborhood page for Admin site
 * transactions required to delete
 * June 2, 2020
 * by Dawn Baker
 */
Namespace Capstone;

require __DIR__ . '/../../config.php';

require CLASSES . '/NeighborhoodModel.php';

use Capstone\NeighborhoodModel;

// confirm form data is a POST request or die 
if('POST' !== $_SERVER['REQUEST_METHOD'] ){
    $flash = array(
        'class' => 'flash_error',
        'message' => 'Pick a neighborhood to delete.'
        );

        $_SESSION['flash'] = $flash;

        header('Location: /admin/neighborhoods.php');
        die;
}

// if a post request begin transaction 

$model = new NeighborhoodModel();
dd($model);

$del = $model->delete($_POST['hood_id']);

dd($_POST);
die;

/**
 * if successful deletion of record redirect back to the list view page with a message 
 * or die with an error message
 * */
if($del > 0) {
    $flash = array(
        'class'=>'success',
        'message'=>'The record was deleted'
    );
    $_SESSION['flash'] = $flash; 
} else {
    $flash = array(
        'class' => 'flash_error',
        'message' => 'There was a problem deleting that record.'
        );

        $_SESSION['flash'] = $flash;
        die;
}

header('Location: /admin/neighborhoods.php');
die;