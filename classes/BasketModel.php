<?php

namespace Capstone;

class BasketModel extends Model
{
    protected $table = 'baskets';
    protected $key = 'basket_id';

    public function add($array)
    {
        $query = "INSERT INTO baskets
                (user_id, first_name, last_name, email)
                VALUES 
                (:user_id, :first_name, :last_name, :email)";

            $stmt = static::$dbh->prepare($query);

            $params = array(
                    ':user_id' => $array['user_id'],
                    ':first_name' => $array['first_name'],
                    ':last_name' => $array['last_name'],
                    ':email' => $array['email']
            );

            $stmt->execute($params);

            return static::$dbh->lastInsertId();
    }

    public function addBasketItems($items, $basket_id)
    {
        $query = "INSERT INTO baskets_neighborhoods
                (basket_id, hood_id, name, location, rating_scale)
                VALUES
                (:basket_id, :hood_id, :name, :location, :rating_scale)";

        foreach($items as $item){
            $stmt = static::$dbh->prepare($query);
            $params = array(
                ':basket_id' => $basket_id,
                ':hood_id' => $item['hood_id'],
                ':name' => $item['name'],
                ':location' => $item['location'],
                ':rating_scale' => $item['rating_scale']

            );


            $stmt->execute($params);
        }

    }

    public function getBasketItems($basket_id)
    {
        $query = "SELECT * FROM baskets_neighborhoods
                    WHERE basket_id = :basket_id";

        $stmt = static::$dbh->prepare($query);
        
        $params = array(
            ':basket_id' => intval($basket_id)
        );

        $stmt->execute($params);

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }
    
}