<?php
/**
 * profile page displays Profile info and basket info
 * Dawn Baker 
 * June 3 2020 
 * Capstone project
 */
require __DIR__ . '/../config.php';
require CLASSES . '/UserModel.php';
require CLASSES . '/BasketModel.php';

use Capstone\UserModel;
use Capstone\BasketModel;


// verify if there is a valid user logging in 
if(empty($_SESSION['user_id'])) {
    $_SESSION['errors'] = $errors;
    $flash = array(
        'class' => 'flash_error',
        'message' => "You must be logged in to see that page."
    );
    $_SESSION['flash'] = $flash;
    header('Location: login.php');
    die;
}
// logged in user will get thier profile page and a message they are logged in 
$model = new UserModel();
$user = $model->userProfile($_SESSION['user_id']);

// logged in user will get their basket info
$model = new BasketModel();
$basket = $model->getUserBasket($_SESSION['user_id']);

$title = "Profile";

require __DIR__ . '/../includes/header.inc.php';
?>
<section class="clearfix">
    <div class="user_info">
        <h2><?=esc($user['first_name'])?>'s Profile Page</h2>
        <p>
            <strong>First Name</strong>: <?=esc($user['first_name'])?><br />
            <strong>Last Name</strong>: <?=esc($user['last_name'])?><br />
            <strong>Email Address</strong>: <?=esc($user['email'])?><br />
            <strong>Phone Number</strong>: <?=esc($user['phone_number'])?>
        </p>
        <hr />
        <p>
            <strong>Street</strong>: <?=esc($user['address'])?><br />
            <strong>City</strong>: <?=esc($user['city'])?><br />
            <strong>Province</strong>: <?=esc($user['province'])?><br />
            <strong>First Name</strong>: <?=esc($user['postal_code'])?><br />
            <strong>First Name</strong>: <?=esc($user['country'])?>
        </p>
    </div>

    <div class="basket_info">
        <h2>Your Baskets</h2>

        <?php foreach($basket as $row) : ?>
        <p>
            <strong>Basket</strong>: # <?=esc($row['basket_id'])?><br />
            <strong>Created</strong>: <?=esc($row['created_at'])?><br />
            <strong>Updated</strong>: <?=esc($row['updated_at'])?> </p>
            <form action="delete_basket.php" method="post">
                <input type="hidden" name="csrf" value="<?=csrfToken()?>" />
                <input type="hidden" name="basket_id" value="<?=esc_attr($row['basket_id'])?>" />
                <button onclick="return (confirm('Are you sure you want to delete that basket?'))" type="submit">Delete</button>
            </form>
            <hr />
        <?php endforeach; ?>

    </div>
</section>
<?php

require __DIR__ . '/../includes/footer.inc.php'

?>
