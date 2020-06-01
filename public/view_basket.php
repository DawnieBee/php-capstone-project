<?php

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

    <h2>Your basket of hoods</h2> 
    
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
                <td></td>
                <td colspan="2">
                    <button><a href="areas.php" class="btn">Continue Browsing</a></button>
                </td>
                <td colspan="2">
                    <button><a href="checkout.php">Fill Basket</a></button>
                </td>
            </tr>

        </table>
    </div>

    
<?php

require __DIR__ . '/../includes/footer.inc.php'

?>
