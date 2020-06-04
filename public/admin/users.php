<?php
/**
 * Show a list of users for Admin site
 * June 1, 2020
 * by Dawn Baker
 */
namespace Capstone; 

require __DIR__ . '/../../config.php';

require CLASSES . '/NeighborhoodModel.php';

use Capstone\UserModel;

//confirm user is Admin
if(!isAdmin()){
    $flash = array(
        'class' => 'flash_error',
        'message' => 'Sorry, You must be an Admin user to access this page.'
        );

    $_SESSION['flash'] = $flash;

    header('Location: /login.php');
    die;
}

$user = new UserModel();

$result = $user->all();


$title = 'Users | Admin';

$subtitle = 'Users';

require __DIR__ . '/../../includes/admin_header.inc.php';

require __DIR__ . '/../../includes/admin_nav.inc.php';

?>

    <?php if(!empty($flash)) : ?>
        <div class="flash <?=esc_attr($flash['class'])?>">
            <span><?=esc($flash['message'])?></span>
        </div>
    <?php endif; ?>  
    <!-- main content -->

    <div class="container">
        <div class="search">
            <form action="neighborhoods.php" method="get" autocomplete="off" novalidate>
                <input type="text" id="s" name="s" maxlength="255" placeholder="Search Users" />&nbsp;
                <input type="submit" value="search" />
                <div>
                    <ul id="live_search"></ul>
                </div>
            </form>
        </div> <!-- end search -->
    </div>
    <div class="clear"></div>

    <div class="container">
        <h1><?=$subtitle?></h1>

        <?php if(!empty($_GET['s'])) : ?>

            <h3>You searched for: <?=$_GET['s']?></h3>

        <?php endif; ?>
        <div class="row">
            <div class="col-lg-12">
                
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>User ID</th>
                            <th>Registration Date</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Postal Code</th>
                        </tr>
                        
                        <!-- get the table properties as a list in table -->
                        <?php foreach($result as $row) : ?>
                            <tr>
                                <td><?=esc($row['user_id'])?></td>
                                <td><?=esc($row['created_at'])?></td>
                                <td><?=esc($row['first_name'])?> <?=esc($row['last_name'])?></td>
                                <td><?=esc($row['email'])?></td>
                                <td><?=esc($row['city'])?></td>
                                <td><?=esc($row['postal_code'])?></td>
                            </tr>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end container -->

</body>
</html>