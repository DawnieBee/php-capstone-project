<?php
/**
 * Dawn Baker
 * OO_PHP 
 * Assignment 2
 */
namespace Capstone; 

require __DIR__ . '/../../config.php';

require CLASSES . '/NeighborhoodModel.php';


$neighborhood = new NeighborhoodModel();

$result = $neighborhood->all();

$title = 'Neighborhoods | Admin';

$navbarbrand = 'Neighborhoods';

require __DIR__ . '/../../includes/admin_header.inc.php';

require __DIR__ . '/../../includes/admin_nav.inc.php';

?>

<body>

    

    <?php if(!empty($flash)) : ?>
        <div class="flash <?=esc_attr($flash['class'])?>">
            <span><?=esc($flash['message'])?></span>
        </div>
    <?php endif; ?>  
    <h1><?=$title?></h1>
    <div class="search">
        <form action="/" method="get" autocomplete="off" novalidate>
            <input type="text" id="s" name="s" maxlength="255" />&nbsp;
            <input type="submit" value="search" />
            <div>
                <ul id="live_search"></ul>
            </div>
        </form>
    </div> <!-- end search -->

    <!-- main content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Neighborhoods</h1>
                
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
                                <td><?=esc($row['name'])?></a></td>
                                <td><?=esc($row['location'])?></td>
                                <td><?=esc($row['rating_scale'])?></td>
                                <td><?=esc($row['description'])?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="neighborhood_edit.php?hood_id=<?=$row['hood_id']?>">edit</a>
                                    <a class="delete btn btn-danger btn-sm" data_id="" href="#">delete</a>
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
