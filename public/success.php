<?php
/**
 * Dawn Baker
 * Inter PHP
 *Assignment 1
 */
/**
 * registration success page
 */

require __DIR__ . '/../config.php';

$title = "Registration Success!";



 if(empty($_SESSION['user_id'])) {
     die('Please sign up or login');
 }
 
 $query = 'SELECT *
             FROM users 
             WHERE 
             user_id = :user_id';
 $stmt = $dbh->prepare($query);

 $params = array(
     ':user_id' => intval($_SESSION['user_id'])
 );
 
 $stmt->execute($params);
 
 $result = $stmt->fetch(PDO::FETCH_ASSOC);
 
 // if no user with that user_id die with an error message 
 if($result === false) {
     die('We could not find that user');
 }

 // otherwise load the page with the profile information

require __DIR__ . '/../includes/header.inc.php';
?>
    <h2>Thank you for registering with us!</h2>

    <p>You have entered the following information:</p>
    <div class="user_info">
        <table>
            <tr>
                <th><strong>First Name</strong></th>
                <td><?=$result['first_name']?></td>
            </tr>
            <tr>
                <th><strong>Last Name</strong></th> 
                <td><?=$result['last_name']?></td>
            </tr>
            <tr>
                <th><strong>Email</strong></th>
                <td><?=$result['email']?></td>
            </tr>
            <tr>
                <th><strong>Phone Number</strong></th> 
                <td><?=$result['phone_num']?></td>
            </tr>
            <tr>
                <td><strong>Address</strong></td>
                <td><?=$result['address']?></td>
            </tr>
            <tr>
                <td><strong>City</strong></td>
                <td><?=$result['city']?></td>
            </tr>
            <tr>
                <td><strong>Province</strong></td>
                <td><?=$result['prov']?></td>
            </tr>
            <tr>
                <td><strong>Postal Code</strong></td>
                <td><?=$result['post_code']?></td>
            </tr>
                <td><strong>Country</strong></td>
                <td><?=$result['country']?></td>
            </tr>
        </table>
    </div>
<?php

require __DIR__ . '/../includes/footer.inc.php'

?>