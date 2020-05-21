<?php

require __DIR__ . '/../../config.php';
require CLASSES . '/NeighborhoodModel.php';

use Capstone\NeighborhoodModel;

$neighborhood = new NeighborhoodModel();

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
    <meta charset="UTF-8">
    <title>Update List</title>
</head>
<body>


    <h1>Update Neighborhoods</h1>
    
    <form action="neighborhood_update.php" method="post">
        
        <input type="hidden" name="hood_id" readonly value="<?=esc_attr(old('hood_id', $result))?>" />
        <p><label for="name">Neighborhood: </label><br />
            <input type="text" name="name" value="<?=esc_attr(old('name', $result))?>" /></p>
        <p><label for="location">location: </label><br />
            <input type="text" name="location" value="<?=esc_attr(old('location', $result))?>" /></p>
        <p><label for="description">Description: </label><br />
            <input type="text" name="description" value="<?=esc_attr(old('description', $result))?>" /></p>
        <p><label for="rating_scale">Rating: </label><br />
            <input type="text" name="rating_scale" value="<?=esc_attr(old('rating_scale', $result))?>" /></p>
        <p><label for="police_station">Police Station: </label><br />
            <input type="text" name="police_station" value="<?=esc_attr(old('police_station', $result))?>" /></p>




        <p><button type="submit">Update Neighborhood</button></p>
    </form>

    
</body>
</html>