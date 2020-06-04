<?php
/**
 * directed here when you click the see more link on areas page
 * Dawn Baker 
 * June 3 2020 
 * Capstone project
 */
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

    $result = $neighborhood->NeighborhoodOne($_GET['hood_id']);
   
}


$title = "Area Detail";

require __DIR__ . '/../includes/header.inc.php';



?>

<section>
       
    <div id="container" class="clearfix">
        <div class="search">
            <form action="areas.php" method="get" autocomplete="off" novalidate>
                <input type="text" id="s" name="s" maxlength="255" placeholder="Search Areas" />&nbsp;
                <input type="submit" value="search" />
                <div>
                    <ul id="live_search"></ul>
                </div>
            </form>
        </div> <!-- end search -->
        <div class="clear"></div>
            
            <img class="hood_img" src="images/<?=esc_attr($result['img'])?>" alt="<?=esc_attr($result['name'])?>" />
            
            <h2><?=$result['name']?></h2>
            
            <table class="area_detail">
                <tr>
                    <th>Name :</th>
                    <td><?=esc($result['name'])?></td>
                </tr>
                <tr>
                    <th>Location :</th>
                    <td><?=esc($result['location'])?></td>
                </tr>
                <tr>
                    <th>Rating :</th>
                    <td><?=esc($result['rating_scale'])?></td>
                </tr>
                <tr>
                    <th>Police Station :</th>
                    <td><?=esc($result['police_station'])?></td>
                </tr>
                <tr>
                    <th>Fire Station :</th>
                    <td><?=esc($result['fire_station'])?></td>
                </tr>
                <tr>
                    <th>Library :</th>
                    <td><?=esc($result['library'])?></td>
                </tr>
                <tr>
                    <th>Pool :</th>
                    <td><?=esc($result['pool'])?></td>
                </tr>
                <tr>
                    <th>Primary Schools :</th>
                    <td><?=esc($result['prim_schools'])?></td>
                </tr>
                <tr>
                    <th>Secondary Schools :</th>
                    <td><?=esc($result['sec_schools'])?></td>
                </tr>
                <tr>
                    <th>Churches :</th>
                    <td><?=esc($result['churches'])?></td>
                </tr>                   
                <tr>
                    <th>Playgrounds :</th>
                    <td><?=esc($result['playgrounds'])?></td>
                </tr>    
                <tr>
                    <th>Community Centres :</th>
                    <td><?=esc($result['comm_centres'])?></td>
                </tr>  
                <tr>
                    <th>Minimum House Prices :</th>
                    <td><?=esc($result['house_price_min'])?></td>
                </tr>
                <tr>
                    <th>Maximum House Prices :</th>
                    <td><?=esc($result['house_price_max'])?></td>
                </tr>
                <tr>
                    <th>Description :</th>
                    <td><?=esc($result['description'])?></td>   
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <form action="basket.php?hood_id<?=esc_attr($result['hood_id'])?>" method="post">
                            <input type="hidden" name="csrf" value="<?=csrfToken()?>" />
                            <input type="hidden" name="hood_id" value="<?=esc_attr($result['hood_id'])?>" />
                            <button type="submit">Add to Basket</button>
                        </form>
                    </td>
                </tr>      
            </table>

        <form action="areas.php">
            <button class="details_back" type="submit">Back</button>
        </form>

    </div>

</section>

<?php
require __DIR__ . '/../includes/footer.inc.php';

?>
