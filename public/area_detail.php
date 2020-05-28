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
    // $result = array();
    $result = $neighborhood->NeighborhoodOne($_GET['hood_id']);
    // dd($result);
    // die;
}


$title = "Neighborhood Detail";

require __DIR__ . '/../includes/header.inc.php';

?>

   <section>
       
       <div id="container" class="clearfix">
            <h1><?=$title?></h1>
          
            <h3><?=$result['name']?></h3>


           
            <img src="images/<?=esc_attr($result['img'])?>" alt="<?=esc_attr($result['name'])?>" />

            <ul>
                
                <li><strong>Name:</strong> <?=esc($result['name'])?></li>
                <li><strong>Location:</strong><?=esc($result['location'])?></li>
                <li><strong>Rating:</strong><?=esc($result['rating_scale'])?></li>
                <li><strong>Police Station:</strong><?=esc($result['police_station'])?></li>
                <li><strong>Fire Station:</strong><?=esc($result['fire_station'])?></li>
                <li><strong>Library:</strong><?=esc($result['library'])?></li>
                <li><strong>Pool:</strong><?=esc($result['pool'])?></li>
                <li><strong>Primary Schools:</strong><?=esc($result['prim_schools'])?></li>
                <li><strong>Secondary Schools:</strong><?=esc($result['sec_schools'])?></li>
                <li><strong>Churches:</strong><?=esc($result['churches'])?></li>
                <li><strong>Playgrounds:</strong><?=esc($result['playgrounds'])?></li>
                <li><strong>Community Centres:</strong><?=esc($result['comm_centres'])?></li>
                <li><strong>Minimum House Price:</strong><?=esc($result['house_price_min'])?></li>
                <li><strong>Maximum House Price:</strong><?=esc($result['house_price_max'])?></li>

                <li><strong>Description:</strong><?=esc($result['description'])?></li>

            </ul>

       </div>
   </section>

   <?php
   require __DIR__ . '/../includes/footer.inc.php';

   ?>