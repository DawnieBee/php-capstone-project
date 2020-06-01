<?php

namespace Capstone;

class BasketModel extends Model
{
    protected $table = 'baskets';
    protected $key = 'basket_id';

    public function add($array)
    {
        $query = "INSERT INTO baskets
            (
                user_id,
                hood_id,
                first_name,
                last_name,
                email,
                name,
                location,
                rating_scale,
            )
            VALUES 
            (
                :user_id,
                :hood_id,
                :first_name,
                :last_name,
                :email,
                :name,
                :location,
                :rating_scale   
            )";

            $stmt = static::$dbh->prepare($query);

            $params = array(
                    ':user_id' => $array['user_id'],
                    ':hood_id' => $array['hood_id'],
                    ':first_name' => $array['first_name'],
                    ':last_name' => $array['last_name'],
                    ':email' => $array['email'],
                    ':name' => $array['name'],
                    ':location' => $array['location'],
                    ':rating_scale' > $array['rating_scale']
            );

            $stmt->execute($params);

            return static::$dbh->lastInsertId();
    }

    
}