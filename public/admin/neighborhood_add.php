<?php
/**
 * Add a Neighborhood page for Admin site
 * June 1, 2020
 * by Dawn Baker
 */
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
            <div class="row">
                <div class="col-lg-12">

                <?php if(count($errors) > 0) : ?>
                    <div class="error">
                        <ul>
                            <?php foreach($errors as $error) : ?>
                            <li><?=$error?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <form action="add_handle_form.php" method="post">
                    
                    <input type="hidden" name="hood_id" readonly value="" />
                    <div class="form-group">
                        <p><label for="name">Neighborhood: </label><br />
                            <input class="form-control" type="text" name="name" value="<?=esc_attr(old('name', $post))?>" maxlength="255" /></p>

                    </div>
                    <div class="form-group">
                        <p><label for="location">location: </label><br />
                            <input class="form-control" type="text" name="location" value="<?=esc_attr(old('location', $post))?>" maxlength="45" placeholder="" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="description">Description: </label><br />
                            <textarea class="form-control" name="description" ><?=esc_attr(old('name', $post))?></textarea></p>
                    </div>
                    <div class="form-group">
                        <p><label for="img">Image: </label><br />
                            <input class="form-control" type="text" name="img" value="<?=esc_attr(old('img', $post))?>" maxlength="255" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="rating_scale">Rating: </label><br />
                            <input class="form-control" type="text" name="rating_scale" value="<?=esc_attr(old('rating_scale', $post))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="police_station">Police Station: </label><br />
                            <input class="form-control" type="text" name="police_station" value="<?=esc_attr(old('police_station', $post))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="fire_station">Fire Station: </label><br />
                            <input class="form-control" type="text" name="fire_station" value="<?=esc_attr(old('fire_station', $post))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="library">Library: </label><br />
                            <input class="form-control" type="text" name="library" value="<?=esc_attr(old('library', $post))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="pool">Pool: </label><br />
                            <input class="form-control" type="text" name="pool" value="<?=esc_attr(old('pool', $post))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="prim_schools">Primary Schools: </label><br />
                            <input class="form-control" type="text" name="prim_schools" value="<?=esc_attr(old('prim_schools', $post))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="sec_schools">Secondary Schools: </label><br />
                            <input class="form-control" type="text" name="sec_schools" value="<?=esc_attr(old('sec_schools', $post))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="churches">Churches: </label><br />
                            <input class="form-control" type="text" name="churches" value="<?=esc_attr(old('churches', $post))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="playgrounds">Playgrounds: </label><br />
                            <input class="form-control" type="text" name="playgrounds" value="<?=esc_attr(old('playgrounds', $post))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="comm_centres">Community Centres: </label><br />
                            <input class="form-control" type="text" name="comm_centres" value="<?=esc_attr(old('comm_centres', $post))?>" maxlength="255" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="house_price_min">House Price Minimum: </label><br />
                            <input class="form-control" type="text" name="house_price_min" value="<?=esc_attr(old('house_price_min', $post))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="house_price_max">House Price Maximum: </label><br />
                            <input class="form-control" type="text" name="house_price_max" value="<?=esc_attr(old('house_price_max', $post))?>" /></p>
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