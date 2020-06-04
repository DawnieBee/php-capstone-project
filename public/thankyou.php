<?php
/**
 * after the user has checked out, this is the thankyou page
 * Dawn Baker 
 * June 3 2020 
 * Capstone project
 */
require __DIR__ . '/../config.php';


$title = "Thank You";


// make sure user is logged in 
if(!auth()) {
    $flash = array(
        'class' => 'flash_error',
        'message' => "You must be logged in to fill your order."
    );
    $_SESSION['flash'] = $flash;
    $_SESSION['target'] = 'checkout.php';
    header('Location: login.php');
    die;
}

if(empty($_SESSION['basket_id'])) {
    die('No order');
}

require CLASSES . '/BasketModel.php';

$model = new Capstone\BasketModel();

$basket = $model->one($_SESSION['basket_id']);

$items = $model->getBasketItems($basket['basket_id']);

require __DIR__ . '/../includes/header.inc.php';
?>

<h2 class="title">Your Basket of Hoods</h2> 
<div class="receipt_basket">
    <ul>
        <li>Order Number: <?=esc($basket['basket_id'])?></li>
        <li>Order Date: <?=esc($basket['created_at'])?></li>
        <li>User Name: <?=esc($basket['first_name'])?>  <?=esc($basket['last_name'])?></li>
        <li>Email: <?=esc($basket['email'])?></li>
    </ul>
</div>


<div>
    <table class="basketofhoods">
        <tr>
            <th><strong>ID</strong></th>
            <th><strong>Neighborhood</strong></th>
            <th><strong>Location</strong></th>
            <th><strong>Rating</strong></th>
        </tr>
        <?php foreach ($items as $item) :?>
        
        <tr>
            <td><?=esc($item['hood_id'])?></td>
            <td><?=esc($item['name'])?></td>
            <td><?=esc($item['location'])?></td>
            <td><?=esc($item['rating_scale'])?></td>  
        </tr>
        <?php endforeach; ?>
    </table>
</div>

    
<?php

require __DIR__ . '/../includes/footer.inc.php'

?>
