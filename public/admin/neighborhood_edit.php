<?php

require __DIR__ . '/../../config.php';
require CLASSES . '/NeighborhoodModel.php';

use Capstone\NeighborhoodModel;

$neighborhood = new NeighborhoodModel();

// if errors in form submission, will come back here 
if(!empty($post)){ 

    $result = $post;
} else {

    if(empty($_GET['hood_id'])) {
        die('Pick a neighborhood to edit');
    }

    $result = $neighborhood->one($_GET['hood_id']);
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
    <h1>Update Neighborhoods</h1>
    
    <form action="neighborhood_update.php" method="post">
        
        <input type="hidden" name="hood_id" readonly value="<?=esc_attr(old('hood_id', $result))?>" />
        <p><label for="name">Neighborhood: </label><br />
            <input type="text" name="name" value="<?=esc_attr(old('name', $result))?>" /></p>
        <p><label for="location">location: </label><br />
            <input type="text" name="location" value="<?=esc_attr(old('location', $result))?>" /></p>
        <p><label for="description">Description: </label><br />
            <input type="text" name="description" value="<?=esc_attr(old('description', $result))?>" /></p>
        <p><label for="img">Image: </label><br />
            <input type="text" name="img" value="<?=esc_attr(old('img', $result))?>" /></p>
        <p><label for="rating_scale">Rating: </label><br />
            <input type="text" name="rating_scale" value="<?=esc_attr(old('rating_scale', $result))?>" /></p>
        <p><label for="police_station">Police Station: </label><br />
            <input type="text" name="police_station" value="<?=esc_attr(old('police_station', $result))?>" /></p>
        <p><label for="fire_station">Fire Station: </label><br />
            <input type="text" name="fire_station" value="<?=esc_attr(old('fire_station', $result))?>" /></p>
        <p><label for="library">Library: </label><br />
            <input type="text" name="library" value="<?=esc_attr(old('library', $result))?>" /></p>
        <p><label for="pool">Pool: </label><br />
            <input type="text" name="pool" value="<?=esc_attr(old('pool', $result))?>" /></p>
        <p><label for="prim_schools">Primary Schools: </label><br />
            <input type="text" name="prim_schools" value="<?=esc_attr(old('prim_schools', $result))?>" /></p>
        <p><label for="sec_schools">Secondary Schools: </label><br />
            <input type="text" name="sec_schools" value="<?=esc_attr(old('sec_schools', $result))?>" /></p>
        <p><label for="churches">Churches: </label><br />
            <input type="text" name="churches" value="<?=esc_attr(old('churches', $result))?>" /></p>
        <p><label for="playgrounds">Playgrounds: </label><br />
            <input type="text" name="playgrounds" value="<?=esc_attr(old('playgrounds', $result))?>" /></p>
        <p><label for="comm_centres">Community Centres: </label><br />
            <input type="text" name="comm_centres" value="<?=esc_attr(old('comm_centres', $result))?>" /></p>
        <p><label for="house_price_min">House Price Minimum: </label><br />
            <input type="text" name="house_price_min" value="<?=esc_attr(old('house_price_min', $result))?>" /></p>
        <p><label for="house_price_max">House Price Maximum: </label><br />
            <input type="text" name="house_price_max" value="<?=esc_attr(old('house_price_max', $result))?>" /></p>

        <p><button type="submit">Update Neighborhood</button></p>
    </form>

    
</body>
</html>