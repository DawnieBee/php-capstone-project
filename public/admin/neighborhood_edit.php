<?php

require __DIR__ . '/../../config.php';
require CLASSES . '/NeighborhoodModel.php';

use Capstone\NeighborhoodModel;

$neighborhood = new NeighborhoodModel();

if(!empty($post)) {

    // we have been redirect back here from 03_process_publisher.php
    // See line 24 of config.php
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

        die('Pick a neighborhood to edit');
    }

    // Create query to get publisher with publisher_id
    $query = 'SELECT * FROM neighborhoods 
            WHERE hood_id = :hood_id';

    // Prepare the query
    $stmt =  $dbh->prepare($query);

    // Create params array
    $params = array(
        ':hood_id' => intval( $_GET['hood_id'] )
    );

    // Execute query
    $stmt->execute($params);

    // Fetch result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

}




?><!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Neighborhoods | Admin</title>

  <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        label{
            font-weight: 700;
        }
        .errors{
            color: #900;
        }
        /* flash messaging options */
        .flash {
          width: 100%;
          line-height: 40px;
          font-weight: bold;
          padding: 0;
          margin:0;
          text-align: center;
        }
        .flash_error {
          color: #bf3d42;
          background: #fae3e4;
          font-weight: bold;
          border: 1px solid #900;
        }
        .success {
          color: #000;
          border: 1px solid #013610;
          background: #e3faea;
          font-weight: bold;
        }
        /*end flash messaging*/
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="/admin">Neighborhoods Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/index.php">Home<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/neighborhoods.php">Neighborhoods</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/baskets.php">Baskets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/orders.php">Orders</a>
                    </li>
                    <li>
                        <a class="nav-link red" href="/logout.php?logout=1">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> <!-- end nav -->
    <?php if(!empty($flash)) : ?>
        <div class="flash <?=esc_attr($flash['class'])?>">
            <span><?=esc($flash['message'])?></span>
        </div>
    <?php endif; ?>  
    <!-- main content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Update Neighborhoods</h1>

                <?php if(count($errors) > 0) : ?>
                    <div class="errors">
                        <ul>
                            <?php foreach($errors as $error) : ?>
                            <li><?=$error?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <form action="neighborhood_update.php" method="post">
                    
                    <input type="hidden" name="hood_id" readonly value="<?=esc_attr(old('hood_id', $result))?>" />
                    <div class="form-group">
                        <p><label for="name">Neighborhood: </label><br />
                            <input class="form-control" type="text" name="name" value="<?=esc_attr(old('name', $result))?>" maxlength="255" /></p>

                    </div>
                    <div class="form-group">
                        <p><label for="location">location: </label><br />
                            <input class="form-control" type="text" name="location" value="<?=esc_attr(old('location', $result))?>" maxlength="45"/></p>
                    </div>
                    <div class="form-group">
                        <p><label for="description">Description: </label><br />
                            <input class="form-control" type="text" name="description" value="<?=esc_attr(old('description', $result))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="img">Image: </label><br />
                            <input class="form-control" type="text" name="img" value="<?=esc_attr(old('img', $result))?>" maxlength="255" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="rating_scale">Rating: </label><br />
                            <input class="form-control" type="text" name="rating_scale" value="<?=esc_attr(old('rating_scale', $result))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="police_station">Police Station: </label><br />
                            <input class="form-control" type="text" name="police_station" value="<?=esc_attr(old('police_station', $result))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="fire_station">Fire Station: </label><br />
                            <input class="form-control" type="text" name="fire_station" value="<?=esc_attr(old('fire_station', $result))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="library">Library: </label><br />
                            <input class="form-control" type="text" name="library" value="<?=esc_attr(old('library', $result))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="pool">Pool: </label><br />
                            <input class="form-control" type="text" name="pool" value="<?=esc_attr(old('pool', $result))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="prim_schools">Primary Schools: </label><br />
                            <input class="form-control" type="text" name="prim_schools" value="<?=esc_attr(old('prim_schools', $result))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="sec_schools">Secondary Schools: </label><br />
                            <input class="form-control" type="text" name="sec_schools" value="<?=esc_attr(old('sec_schools', $result))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="churches">Churches: </label><br />
                            <input class="form-control" type="text" name="churches" value="<?=esc_attr(old('churches', $result))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="playgrounds">Playgrounds: </label><br />
                            <input class="form-control" type="text" name="playgrounds" value="<?=esc_attr(old('playgrounds', $result))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="comm_centres">Community Centres: </label><br />
                            <input class="form-control" type="text" name="comm_centres" value="<?=esc_attr(old('comm_centres', $result))?>" maxlength="255" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="house_price_min">House Price Minimum: </label><br />
                            <input class="form-control" type="text" name="house_price_min" value="<?=esc_attr(old('house_price_min', $result))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><label for="house_price_max">House Price Maximum: </label><br />
                            <input class="form-control" type="text" name="house_price_max" value="<?=esc_attr(old('house_price_max', $result))?>" /></p>
                    </div>
                    <div class="form-group">
                        <p><button type="submit" class="btn btn-primary">Update Neighborhood</button></p>
                    </div>
                </form>
            </div> <!-- end col-->
        </div><!-- end row -->
    </div><!-- end container -->
    
</body>
</html>