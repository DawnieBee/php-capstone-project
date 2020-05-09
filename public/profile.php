<?php

require __DIR__ . '/../config.php';

$title = "Profile";

// verify if there is a valid user logging in 
if(empty($_SESSION['user_id'])) {
    $errors['credentials'] = 'You must be logged in to see that page.';
    $_SESSION['errors'] = $errors;
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

require __DIR__ . '/../includes/header.inc.php';
?>


    <h2>Welcome back <?=esc($user['first_name'])?>! You have successfully logged in.</h2>


    <p>Here is your user information:</p>
    <div class="user_info">
        <table>
            <tr>
                <th><strong>First Name</strong></th>
                <td><?=$user['first_name']?></td>
            </tr>
            <tr>
                <th><strong>Last Name</strong></th> 
                <td><?=$user['last_name']?></td>
            </tr>
            <tr>
                <th><strong>Email</strong></th>
                <td><?=$user['email']?></td>
            </tr>
            <tr>
                <th><strong>Phone Number</strong></th> 
                <td><?=$user['phone_num']?></td>
            </tr>
            <tr>
                <td><strong>Address</strong></td>
                <td><?=$user['address']?></td>
            </tr>
            <tr>
                <td><strong>City</strong></td>
                <td><?=$user['city']?></td>
            </tr>
            <tr>
                <td><strong>Province</strong></td>
                <td><?=$user['prov']?></td>
            </tr>
            <tr>
                <td><strong>Postal Code</strong></td>
                <td><?=$user['post_code']?></td>
            </tr>
                <td><strong>Country</strong></td>
                <td><?=$user['country']?></td>
            </tr>
        </table>
    </div>

    
<?php

require __DIR__ . '/../includes/footer.inc.php'

?>
