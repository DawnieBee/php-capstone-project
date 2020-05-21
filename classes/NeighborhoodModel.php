<?php

namespace Capstone;

class NeighborhoodModel extends Model
{
    protected $table = 'neighborhoods';
    protected $key = 'hood_id';

    public function updateNeighborhood()
    {
        $query = "UPDATE neighborhoods
                SET 
                name = :name,
                location = :location,
                rating_scale = :rating_scale,
                description = :description
                WHERE 
                hood_id = :hood_id";

    $stmt = $dbh->prepare($query);

    $params = array(
        ':name' => $_POST['name'],
        ':location' => $_POST['location'],
        ':rating_scale' => $_POST['rating_scale'],
        ':description' => $_POST['description']
    );

    $stmt->execute($params);

    header('Location: neighborhoods.php');
    }

}

