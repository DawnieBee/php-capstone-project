<?php
/**
 * Model
 * generic functions to retrieve information from the database
 * and to initiate the $dbh
 * June 1, 2020
 * by Dawn Baker
 */

namespace Capstone;

class Model 
{
    static protected $dbh;
    
    /**
     * function to initialize pdo dbh
     * @param  PDO    $dbh any type of PDO is accepted
     * @return whatever     
     */
    static public function init(\PDO $dbh)
    {
        static::$dbh = $dbh;
    }

    /**
     * Get all Records from table
     * @return Array 
     */
    final public function all()
    {

        $query = "SELECT * FROM {$this->table}";
        $stmt = static::$dbh->query($query);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    /**
     * Get One Record from table
     * @param  int    $id 
     * @return Array     
     */
    final public function one(int $id)
    {
        $query = "SELECT * FROM {$this->table} WHERE {$this->key} = :id";

        $stmt = static::$dbh->prepare($query);

        $params = array(
            ':id' => $id
        );

        $stmt->execute($params);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $result;

    }
}