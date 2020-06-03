<?php
/**
 * Show a list view of Neigborhoods for Admin site with the option to create, edit or delete and search by name, 
 * June 1, 2020
 * by Dawn Baker
 */
namespace Capstone; 

require __DIR__ . '/../../config.php';

require CLASSES . '/NeighborhoodModel.php';

use Capstone\NeighborhoodModel;

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

$neighborhood = new NeighborhoodModel();

$result = $neighborhood->all();



// search functionality
if(!empty($_GET['s'])) {   
    $result = $neighborhood->searchNeighborhood($_GET['s']);
} else {
    // retrieve all neighborhoods if no search
    $result = $neighborhood->all();
}

$title = 'Neighborhoods | Admin';

$subtitle = 'Neighborhoods';

require __DIR__ . '/../../includes/admin_header.inc.php';

require __DIR__ . '/../../includes/admin_nav.inc.php';

?>

<body>
    
    <?php if(!empty($flash)) : ?>
        <div class="flash <?=esc_attr($flash['class'])?>">
            <span><?=esc($flash['message'])?></span>
        </div>
    <?php endif; ?>  
    <!-- main content -->
    
    <div class="container">
        <div class="search">
            <form action="neighborhoods.php" method="get" autocomplete="off" novalidate>
                <input type="text" id="s" name="s" maxlength="255" placeholder="Search Neighborhoods" />&nbsp;
                <input type="submit" value="search" />
                <div>
                    <ul id="live_search"></ul>
                </div>
            </form>
        </div> <!-- end search -->
        <div class="clear"></div>
        
        <h1><?=$subtitle?></h1>
        <div class="add_hood">
            <a class="btn btn-primary btn-sm" href="neighborhood_add.php">Add Neighborhood</a>
        </div>


        <?php if(!empty($_GET['s'])) : ?>

            <h3>You searched for: <?=$_GET['s']?></h3>

        <?php endif; ?>

        <div class="row">
            <div class="col-lg-12">
                
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Neighborhood</th>
                            <th>Location</th>
                            <th>Rating</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        <!-- get the table properties as a list in table -->
                        <?php foreach($result as $row) : ?>
                            <tr>
                                <td><?=esc($row['hood_id'])?></td>
                                <td><?=esc($row['name'])?></td>
                                <td><?=esc($row['location'])?></td>
                                <td><?=esc($row['rating_scale'])?></td>
                                <td><?=esc($row['description'])?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="neighborhood_edit.php?hood_id=<?=$row['hood_id']?>">edit</a>
                                    <form action="delete.php" method="post">
                                        <input type="hidden" name="hood_id" value="<?=esc_attr($row['hood_id'])?>" />
                                        <button onclick="return (confirm('Are you sure you want to delete?'))" class="delete btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                </td>   
                            </tr>
                        <?php endforeach; ?>                        
                    </tbody>
                </table>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end container -->
</body>
</html>
