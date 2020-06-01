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
            <tr>
                <td><?=esc($_SESSION['basket']['hood_id'])?></td>
                <td><?=esc($_SESSION['basket']['name'])?></td>
                <td><?=esc($_SESSION['basket']['location'])?></td>
                <td><?=esc($_SESSION['basket']['rating_scale'])?></td>  

        </table>
        <form action="process_order.php" method="post"></form>
        <p><button type="submit">Confirm</button></p>
    </div>

    
<?php

require __DIR__ . '/../includes/footer.inc.php'

?>
