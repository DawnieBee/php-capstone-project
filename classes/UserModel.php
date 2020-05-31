<?php

namespace Capstone;

class UserModel extends Model
{
    protected $table = 'users';
    protected $key = 'user_id';

    public function byEmail($email) 
    {
        // query for user by email
        $query = "SELECT * FROM {$this->table} WHERE email = :email";

        $stmt = static::$dbh->prepare($query);

        $params = array(
            ':email' => $email
        );

        $stmt->execute($params);

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $result;
    }
}
