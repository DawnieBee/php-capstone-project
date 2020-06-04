<?php
/**
 * Basket Model
 * functions to create and add to baskets for users
 * June 1, 2020
 * by Dawn Baker
 */

namespace Capstone;

class BasketModel extends Model
{
    protected $table = 'baskets';
    protected $key = 'basket_id';

    /**
     * function to create a basket for a user
     * @param  $array prepares a query to add data to baskets table
     */
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

    /**
     * function to add multiple items to a basket for user
     * @param  $items     
     * @param  $basket_id 
     * 
     */
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

    /**
     * function query to retrieve the basket_id to present bookmarked areas to user
     * @param  $basket_id user's basket id
     * @return array            
     */
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
    
    /**
     * function to delete a basket from the user profile page
     * @param  int    $id basket_id
     * @return result deleted item will be updated to 1 in database and basket removed from view    
     */
    public function delBasket(int $id)
    {
        $query = "UPDATE baskets 
                SET deleted = 1
                WHERE basket_id = :basket_id";
            $stmt = static::$dbh->prepare($query);
            $params = array(
                ':basket_id' => $id
            );

            $del = $stmt->execute($params);

            return $del;
    }

    /**
     * function to show the profile page the users baskets 
     * @return array 
     */
    public function getUserBasket()
    {
        $query = "SELECT * 
            FROM baskets
            WHERE user_id = :user_id
            AND deleted = 0";
        $stmt = static::$dbh->prepare($query);
        $params = array(
                'user_id' => $_SESSION['user_id']
            );
        $stmt->execute($params);

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

}