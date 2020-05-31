<?php

require __DIR__ . '/../config.php';


$title = "Your Basket";

// verify if there is a valid user logging in 
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

    
    <h2><?=esc($user['first_name'])?>'s basket of hoods.</h2> 


    
    <div class="basketofhoods">
        <table>
            <tr>
                <th><strong>ID</strong></th>
                <th><strong>Neighborhood</strong></th>
                <th><strong>Location</strong></th>
                <th><strong>Rating</strong></th>
                <th><strong>House Price Minimum</strong></th>
                <th><strong>House Price Maximum</strong></th>
            </tr>
            <tr>
                <td><?=esc($_SESSION['basket']['hood_id'])?></td>
                <td><?=esc($_SESSION['basket']['name'])?></td>
                <td><?=esc($_SESSION['basket']['location'])?></td>
                <td><?=esc($_SESSION['basket']['rating_scale'])?></td>
                <td><?=esc($_SESSION['basket']['house_price_min'])?></td>
                <td><?=esc($_SESSION['basket']['house_price_max'])?></td>
            </tr>
            <tr>
                <td><?=number_format($total)?></td>
            </tr>
            <tr>
                td
            </tr>
        </table>
    </div>

    
<?php

require __DIR__ . '/../includes/footer.inc.php'

?>
