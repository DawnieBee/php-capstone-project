<?php
/**
 * Delete a Neigborhood page for Admin site
 * transactions required to delete
 * June 2, 2020
 * by Dawn Baker
 */
require __DIR__ . '/../config.php';
require CLASSES . '/BasketModel.php';

use Capstone\BasketModel;

//confirm user logged in
if(!auth()){
    $flash = array(
        'class' => 'flash_error',
        'message' => 'Sorry, You must be logged in to access this page.'
        );

    $_SESSION['flash'] = $flash;

    header('Location: login.php');
    die;
}
// confirm form data is a POST request or die 
if('POST' !== $_SERVER['REQUEST_METHOD'] ){
    $flash = array(
        'class' => 'flash_error',
        'message' => 'Pick a basket to delete.'
        );

        $_SESSION['flash'] = $flash;

        header('Location: profile.php');
        die;
}

$model = new BasketModel();

$del = $model->delBasket($_POST['basket_id']);


/**
 * if successful deletion of record redirect back to the list view page with a message 
 * or die with an error message
 * */
if($del > 0) {
    $flash = array(
        'class'=>'success',
        'message'=>'The basket was deleted'
    );
    $_SESSION['flash'] = $flash; 
} else {
    $flash = array(
        'class' => 'flash_error',
        'message' => 'There was a problem deleting that basket.'
        );

        $_SESSION['flash'] = $flash;
        die;
}

header('Location: profile.php');
die;