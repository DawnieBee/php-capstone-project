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
                hood_id = :hood_id,
                name = :name,
                location = :location,
                description = :description,
                img = :img,
                rating_scale = :rating_scale,
                police_station = :police_station,
                fire_station = :fire_station,
                library = :library,
                pool = :pool,
                prim_schools = :prim_schools,
                sec_schools = :sec_schools,
                churches = :churches,
                playgrounds = :playgrounds,
                comm_centres = :comm_centres,
                house_price_min = :house_price_min,
                house_price_max = :house_price_max
                WHERE 
                hood_id = :hood_id";

        $stmt = static::$dbh->prepare($query);

        $params = array(
            ':hood_id'=> $_POST['hood_id'],
            ':name' => $_POST['name'],
            ':location' => $_POST['location'],
            ':description' => $_POST['description'],
            ':img'=> $_POST['img'],
            ':rating_scale' => $_POST['rating_scale'],
            ':police_station' => $_POST['police_station'],
            ':fire_station' => $_POST['fire_station'],
            ':library' => $_POST['library'],
            ':pool' => $_POST['pool'],
            ':prim_schools' => $_POST['prim_schools'],
            ':sec_schools' => $_POST['sec_schools'],
            ':churches' => $_POST['churches'],
            ':playgrounds' => $_POST['playgrounds'],
            ':comm_centres' => $_POST['comm_centres'],
            ':house_price_min' => $_POST['house_price_min'],
            ':house_price_max' => $_POST['house_price_max']
            );

        $stmt->execute($params);


        header('Location: neighborhoods.php');
    }

}

