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
                first_name,
                last_name,
                email,

            )
            VALUES 
            (
                :user_id,
                :first_name,
                :last_name,
                :email   
            )";

            $stmt = static::$dbh->prepare($query);

            $params = array(
                    ':user_id' => $array['user_id'],
                    ':first_name' => $array['first_name'],,
                    ':last_name' => $array['last_name'],,
                    ':email' => $array['email']
            );

            $stmt->execute($params);

            return static::$dbh->lastInsertId();
    }

    
}