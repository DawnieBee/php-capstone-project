<?php
/**
 * directed here when you click the view_basket link
 * Dawn Baker 
 * June 3 2020 
 * Capstone project
 */

require __DIR__ . '/../config.php';

$title = "View Basket";

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

require __DIR__ . '/../includes/header.inc.php';
?>

<h2 class="title">Your basket of hoods</h2> 

<div>
    <table class="basketofhoods">
        <tr>
            <th><strong>ID</strong></th>
            <th><strong>Neighborhood</strong></th>
            <th><strong>Location</strong></th>
            <th><strong>Rating</strong></th>
        </tr>
        <?php foreach($_SESSION['basket'] as $hood) : ?>
        <tr>
            <td><?=esc($hood['hood_id'])?></td>
            <td><?=esc($hood['name'])?></td>
            <td><?=esc($hood['location'])?></td>
            <td><?=esc($hood['rating_scale'])?></td> 
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="2">
                <form action="areas.php">
                    <button class="details_back" type="submit">Continue Browsing</button>
                </form>
            </td>
            <td colspan="2">
                <form action="checkout.php">
                    <button class="details_back" type="submit">Fill Basket</button>
                </form>
            </td>
        </tr>
    </table>
</div> 
<?php

require __DIR__ . '/../includes/footer.inc.php'

?>
