<?php
/* 
 * Dawn Baker            
 * Intro PHP             
 * Assignment 2          
 */
require __DIR__ . '/../config.php';

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

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Success</title>
</head>
<body>
    <h1>Thank you for registering with us!</h1>

    <p>You have entered the following information:</p>

    <ul>
        <li><strong>First Name:</strong><?=$result['first_name']?></li>
        <li><strong>Last Name:</strong><?=$result['last_name']?></li>
        <li><strong>Email:</strong><?=$result['email']?></li>
        <li><strong>Phone Number:</strong><?=$result['phone_num']?></li>
        <li><strong>Address:</strong><?=$result['address']?></li>
        <li><strong>City:</strong><?=$result['city']?></li>
        <li><strong>Province:</strong><?=$result['prov']?></li>
        <li><strong>Postal Code:</strong><?=$result['post_code']?></li>
        <li><strong>Country:</strong><?=$result['country']?></li>
    </ul>
</body>
</html>