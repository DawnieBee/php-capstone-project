<?php

require __DIR__ . '/../../config.php';
require CLASSES . '/NeighborhoodModel.php';

use Capstone\NeighborhoodModel;



$title = 'Neighborhood Add | Admin';

$subtitle = 'Add a Record';

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
         
        <h2><?=$subtitle?></h2>

                
                <form action="neighborhood_add.php" method="post">
                    
                    <input type="hidden" name="hood_id" readonly value="" />
                    <div class="form-group">
                        <p><label for="name">Neighborhood: </label><br />
                            <input class="form-control" type="text" name="name" value="" maxlength="255" /></p>

                    </div>
                    <div class="form-group">
                        <p><label for="location">location: </label><br />
                            <input class="form-control" type="text" name="location" value="" maxlength="45" placeholder="" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="description">Description: </label><br />
                            <textarea class="form-control" name="description" ></textarea></p>
                    </div>
                    <div class="form-group">
                        <p><label for="img">Image: </label><br />
                            <input class="form-control" type="text" name="img" value="" maxlength="255" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="rating_scale">Rating: </label><br />
                            <input class="form-control" type="text" name="rating_scale" value="" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="police_station">Police Station: </label><br />
                            <input class="form-control" type="text" name="police_station" value="" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="fire_station">Fire Station: </label><br />
                            <input class="form-control" type="text" name="fire_station" value="" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="library">Library: </label><br />
                            <input class="form-control" type="text" name="library" value="" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="pool">Pool: </label><br />
                            <input class="form-control" type="text" name="pool" value="" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="prim_schools">Primary Schools: </label><br />
                            <input class="form-control" type="text" name="prim_schools" value="" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="sec_schools">Secondary Schools: </label><br />
                            <input class="form-control" type="text" name="sec_schools" value="" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="churches">Churches: </label><br />
                            <input class="form-control" type="text" name="churches" value="" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="playgrounds">Playgrounds: </label><br />
                            <input class="form-control" type="text" name="playgrounds" value="" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="comm_centres">Community Centres: </label><br />
                            <input class="form-control" type="text" name="comm_centres" value="" maxlength="255" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="house_price_min">House Price Minimum: </label><br />
                            <input class="form-control" type="text" name="house_price_min" value="" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="house_price_max">House Price Maximum: </label><br />
                            <input class="form-control" type="text" name="house_price_max" value="" /></p>
                    </div>
                    <div class="form-group">
                        <p><button type="submit" class="btn btn-primary">Add Neighborhood</button></p>
                    </div>
                </form>
            </div> <!-- end col-->
        </div><!-- end row -->
    </div><!-- end container -->
    
</body>
</html>