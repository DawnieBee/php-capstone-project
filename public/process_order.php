<?php

$title = "Process Order"
require __DIR__ . '/../config.php';


if('POST' != $_SERVER['REQUEST_METHOD']) {
    die('Illegal access');

}

// insert order into database

require CLASSESS . '/UserModel.php';

use Capstone\UserModel;

$model = new UserModel();

$user = $model->one($_SESSION['user_id']);

$neighborhood = $_SESSION['cart'];

$array = array (
    'user_id' => $user['user_id'],
    'hood_id' => $neighborhood['hood_id'],
    'first_name' => $user['first_name'],
    'last_name' => $user['last_name'],
    'email' => $user['email'],
    'name' => $neighborhood['name'],
    'location' => $neighborhood['location'],
    'rating_scale' => $neighborhood['rating_scale']

);

require CLASSES . '/BasketModel.php';

use Capstone\BasketModel;

$model = new BasketModel();

$basket_id = $model->add($array);

if( $basket_id == 0 ){
    $flash = array(
        'class' => 'flash_error',
        'message' => "There was a problem adding your order."
    );
    $_SESSION['flash'] = $flash;
    header('Location: checkout.php');
    die;
}

// all is good to insert 


$_SESSION['basket_id'] = $basket_id;

header('Location: thankyou.php');
die;