<?php
/* 
 * Dawn Baker            
 * Intro PHP             
 * Assignment 2          
 */
/**
 * registration success page
 */

$title = "Registration Success!";

require __DIR__ . '/../includes/header.inc.php';


if(empty($_GET['user_id'])) {
    die('Please use form to register');
}

$query = 'SELECT *
            FROM users 
            WHERE 
            user_id = :user_id';
$stmt = $dbh->prepare($query);
$params = array(
    ':user_id' => intval($_GET['user_id'])
);

$stmt->execute($params);

$result = $stmt->fetch(PDO::FETCH_ASSOC);



?>
    <h2>Thank you for registering with us!</h2>

    <p>You have entered the following information:</p>
    <div class="user_info">
        <ul>
            <li><strong>First Name :</strong>&nbsp;&nbsp; <?=$result['first_name']?></li>
            <li><strong>Last Name :</strong>&nbsp;&nbsp; <?=$result['last_name']?></li>
            <li><strong>Email :</strong>&nbsp;&nbsp; <?=$result['email']?></li>
            <li><strong>Phone Number :</strong>&nbsp;&nbsp; <?=$result['phone_num']?></li>
            <li><strong>Address :</strong>&nbsp;&nbsp; <?=$result['address']?></li>
            <li><strong>City :</strong>&nbsp;&nbsp; <?=$result['city']?></li>
            <li><strong>Province :</strong>&nbsp;&nbsp; <?=$result['prov']?></li>
            <li><strong>Postal Code :</strong>&nbsp;&nbsp; <?=$result['post_code']?></li>
            <li><strong>Country :</strong>&nbsp;&nbsp; <?=$result['country']?></li>
        </ul>
    </div>
<?php

require __DIR__ . '/../includes/footer.inc.php'

?>