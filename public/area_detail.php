<?php

require __DIR__ . '/../config.php';
require CLASSES . '/NeighborhoodModel.php';

use Capstone\NeighborhoodModel;

if(!empty($post)) {

    // we have been redirect back here from neighborhood_update.php
    // as post values from line 32 in config.php
    $result = $post;

} else {

    // Somebody has clicked a publisher from the publisher list
    
    if(empty($_GET['hood_id'])) {
        $flash = array(
            'class' => 'flash_error',
            'message' => 'Pick a neighborhood to edit.'
            );

            $_SESSION['flash'] = $flash;

            header('Location: neighborhoods.php');
            die;
    }
    // instantiate new model 
    $neighborhood = new NeighborhoodModel();
    $result = array();
    $result = $neighborhood->NeighborhoodOne($_GET['hood_id']);

}


$title = "Neighborhood Detail";

require __DIR__ . '/../includes/header.inc.php';

?>

   <section>
       
       <div id="container" class="clearfix">
            <h1><?=$title?></h1>
          

            <?php foreach($result as $row) : ?>
            
            <h3><?=$row['name']?></h3>


           
            <img src="images/<?=esc_attr($row['img'])?>" alt="<?=esc_attr($row['name'])?>" />

            <ul>
                
                <li><strong>Name:</strong> <?=esc($row['name'])?></li>
                <li><strong>Location:</strong><?=esc($row['location'])?></li>
                <li><strong>Rating:</strong><?=esc($row['rating_scale'])?></li>
                <li><strong>Police Station:</strong><?=esc($row['police_station'])?></li>
                <li><strong>Fire Station:</strong><?=esc($row['fire_station'])?></li>
                <li><strong>Library:</strong><?=esc($row['library'])?></li>
                <li><strong>Pool:</strong><?=esc($row['pool'])?></li>
                <li><strong>Primary Schools:</strong><?=esc($row['prim_schools'])?></li>
                <li><strong>Secondary Schools:</strong><?=esc($row['sec_schools'])?></li>
                <li><strong>Churches:</strong><?=esc($row['churches'])?></li>
                <li><strong>Playgrounds:</strong><?=esc($row['playgrounds'])?></li>
                <li><strong>Community Centres:</strong><?=esc($row['comm_centres'])?></li>
                <li><strong>Minimum House Price:</strong><?=esc($row['house_price_min'])?></li>
                <li><strong>Maximum House Price:</strong><?=esc($row['house_price_max'])?></li>

                <li><strong>Description:</strong><?=esc($row['description'])?></li>
                <?php endforeach; ?>
            </ul>

       </div>
   </section>

   <?php
   require __DIR__ . '/../includes/footer.inc.php';

   ?>