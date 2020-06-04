<?php
/**
 * User Model
 * functions specific to the User pages... 
 * validates user by email
 * June 1, 2020
 * by Dawn Baker
 */
namespace Capstone;

class UserModel extends Model
{
    protected $table = 'users';
    protected $key = 'user_id';

    /**
     * function to get user from db by email
     * @param  database info $email 
     * @return array        
     */
    public function byEmail($email) 
    {
        // query for user by email
        $query = "SELECT * FROM {$this->table} 
                    WHERE email = :email
                    AND deleted = 0";

        $stmt = static::$dbh->prepare($query);

        $params = array(
            ':email' => $email
        );

        $stmt->execute($params);

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function userProfile($id)
    {
        $query = 'SELECT * FROM users 
            WHERE user_id = :user_id
            AND deleted = 0';  
            
            $stmt = static::$dbh->prepare($query);

            $params = array(
                ':user_id' => $id
            );

            $stmt->execute($params);

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $result;
    }
}
