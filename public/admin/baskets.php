<?php 
/**
 * Show a list view of baksets for Admin site 
 * June 1, 2020
 * by Dawn Baker
 */
namespace Capstone; 

require __DIR__ . '/../../config.php';

require CLASSES . '/NeighborhoodModel.php';

use Capstone\BasketModel;

$basket = new BasketModel();

$result = $basket->all();


$title = 'Baskets | Admin';

$subtitle = 'Baskets';

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
                            <th>Basket ID</th>
                            <th>Basket Order Date</th>
                            <th>User Name</th>
                            <th>Email</th>
                        </tr>
                        
                        <!-- get the table properties as a list in table -->
                        <?php foreach($result as $row) : ?>
                            <tr>
                                <td><?=esc($row['basket_id'])?></td>
                                <td><?=esc($row['created_at'])?></td>
                                <td><?=esc($row['first_name'])?> <?=esc($row['last_name'])?></td>
                                <td><?=esc($row['email'])?></td>
                            </tr>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end container -->

</body>
</html>

