<?php

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

require __DIR__ . '/../includes/header.inc.php';
?>

    
    <h2>Your basket of hoods</h2> 
    

    
    <div>
        <table class="basketofhoods">
            <tr>
                <th><strong>ID</strong></th>
                <th><strong>Neighborhood</strong></th>
                <th><strong>Location</strong></th>
                <th><strong>Rating</strong></th>
            </tr>
            <tr>
                <td><?=esc($_SESSION['basket']['hood_id'])?></td>
                <td><?=esc($_SESSION['basket']['name'])?></td>
                <td><?=esc($_SESSION['basket']['location'])?></td>
                <td><?=esc($_SESSION['basket']['rating_scale'])?></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <a href="areas.php" class="btn">Continue Browsing</a>
                </td>
                <td colspan="2">
                    <a href="checkout.php">Fill Order</a>
                </td>
            </tr>

        </table>
    </div>

    
<?php

require __DIR__ . '/../includes/footer.inc.php'

?>
