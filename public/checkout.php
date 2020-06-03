<?php
/**
 * after you have chosen to add to basket this is the link to fill basket
 * Dawn Baker 
 * June 3 2020 
 * Capstone project
 */
require __DIR__ . '/../config.php';

$title = "Your Basket";

// verify if there are hoods in the basket 
if(count($_SESSION['basket']) == 0) {
    $flash = array(
        'class' => 'flash_error',
        'message' => "There are no items in your basket."
    );
    $_SESSION['flash'] = $flash;
    header('Location: neighborhoods.php');
    die;
}

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

require __DIR__ . '/../includes/header.inc.php';
?>
    
<div>
    <table class="basketofhoods">
        <tr>
            <th><strong>ID</strong></th>
            <th><strong>Neighborhood</strong></th>
            <th><strong>Location</strong></th>
            <th><strong>Rating</strong></th>
        </tr>
        <?php foreach ($_SESSION['basket'] as $hood) :?>
        <tr>
            <td><?=esc($hood['hood_id'])?></td>
            <td><?=esc($hood['name'])?></td>
            <td><?=esc($hood['location'])?></td>
            <td><?=esc($hood['rating_scale'])?></td>  
        </tr>
        <?php endforeach; ?>

    </table>
    <form action="process_order.php" method="post">
        <input type="hidden" name="csrf" value="<?=csrfToken()?>" />
    <button type="submit"><a>Confirm</a></button>
    </form>
</div>

    
<?php

require __DIR__ . '/../includes/footer.inc.php'

?>
