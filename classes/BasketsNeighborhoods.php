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
                user_first_name,
                user_last_name,
                user_email  
            )
            VALUES 
            (
                :user_id,
                :user_first_name,
                :user_last_name,
                :user_email   
            )";

            $stmt = static::$dbh->prepare($query);

            $params = array(
                    ':user_id' => $array['user_id'],
                    ':user_first_name' => $array['user_first_name'],,
                    ':user_last_name' => $array['user_last_name'],,
                    ':user_email' => $array['user_email']
            );

            $stmt->execute($params);

            return $dbh->lastInsertId();
    }
}