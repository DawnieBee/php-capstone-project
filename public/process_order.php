<?php


$title = "Process Order";
require __DIR__ . '/../config.php';

use Capstone\UserModel;
use Capstone\BasketModel;

require CLASSES . '/UserModel.php';


if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Illegal access');
}
try{
    $dbh->beginTransaction();

    // insert order into database
    

    $model = new UserModel();

    $user = $model->one($_SESSION['user_id']);

    $neighborhood = $_SESSION['basket'];

    $array = array (
        'user_id' => $user['user_id'],
        'first_name' => $user['first_name'],
        'last_name' => $user['last_name'],
        'email' => $user['email']
    );

    require CLASSES . '/BasketModel.php';

    

    $model = new BasketModel();
    // dd($model);
    // die;
    $basket_id = $model->add($array);

    $model->addBasketItems($_SESSION['basket'], $basket_id);

    $dbh->commit();

} catch(Exception $e) {

    $dbh->rollBack();
    $flash = array(
        'class' => 'flash_error',
        'message' => "There was a problem adding your basket."
    );
    $_SESSION['flash'] = $flash;
    header('Location: checkout.php');
    die;
}

// all is good to insert 
$_SESSION['basket'] = [];

$_SESSION['basket_id'] = $basket_id;

header('Location: thankyou.php');
die;