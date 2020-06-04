<?php
/**
 * profile page displays Profile info and basket info
 * Dawn Baker 
 * June 3 2020 
 * Capstone project
 */
require __DIR__ . '/../config.php';

$title = "Profile";

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
$query = 'SELECT * 
        FROM users 
        WHERE user_id = :user_id';
$stmt = $dbh->prepare($query);
$params = array(
    ':user_id' => $_SESSION['user_id']
    );
$stmt->execute($params);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$query = "SELECT * 
        FROM baskets
        WHERE user_id = :user_id";
$stmt = $dbh->prepare($query);
$params = array(
        'user_id' => $_SESSION['user_id']
    );
$stmt->execute($params);
$basket = $stmt->fetch(PDO::FETCH_ASSOC);

require __DIR__ . '/../includes/header.inc.php';
?>
<section class="clearfix">
    <div class="user_info">
        <h2><?=esc($user['first_name'])?>'s Profile Page</h2>
        <p>
            <strong>First Name</strong>: <?=$user['first_name']?><br />
            <strong>Last Name</strong>: <?=$user['last_name']?><br />
            <strong>Email Address</strong>: <?=$user['email']?><br />
            <strong>Phone Number</strong>: <?=$user['phone_number']?>
        </p>
        <h3>Mailing Address</h3>
        <p>
            <strong>Street</strong>: <?=$user['address']?><br />
            <strong>City</strong>: <?=$user['city']?><br />
            <strong>Province</strong>: <?=$user['province']?><br />
            <strong>First Name</strong>: <?=$user['postal_code']?><br />
            <strong>First Name</strong>: <?=$user['country']?>
        </p>
    </div>

    <div class="basket_info">
        <h2>Your Baskets</h2>
        <p>
            <strong>Basket</strong>: # <?=$basket['basket_id']?><br />
            created: <?=$basket['created_at']?><br />
            Updated: <?=$basket['updated_at']?>

        </p>
    </div>
</section>
<?php

require __DIR__ . '/../includes/footer.inc.php'

?>
