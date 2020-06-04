<?php
/**
 * Neighborhood Model
 * functions specific to the Neighborhood pages... 
 * June 1, 2020
 * by Dawn Baker
 */
namespace Capstone;

class NeighborhoodModel extends Model
{
    protected $table = 'neighborhoods';
    protected $key = 'hood_id';

    /**
     * function for admin users to update neighborhood information on the Areas page
     * @param  array  $post accepts data from admin user input
     * @return array  result of the POST data
     */
    public function updateNeighborhood(array $post)
    {

        $query = "UPDATE neighborhoods
                SET 
                hood_id = :hood_id,
                name = :name,
                location = :location,
                loc_code = :loc_code,
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
                hood_id = :hood_id
                AND 
                deleted = 0";

        $stmt = static::$dbh->prepare($query);

        $params = array(
            ':hood_id'=> $_POST['hood_id'],
            ':name' => $_POST['name'],
            ':location' => $_POST['location'],
            ':loc_code' => $_POST['loc_code'],
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

        $result = $stmt->rowCount();
        return $result;

    }

    /**
     * function to search the db for neighborhoods
     * @param  $searchterm 3 different search options to give results
     * @return matching searches
     */
    public function SearchNeighborhood($searchterm)
    {
        $query = 'SELECT * FROM 
                neighborhoods
                WHERE 
                neighborhoods.name LIKE :searchterm1
                OR
                neighborhoods.location LIKE :searchterm2
                OR
                neighborhoods.description LIKE :searchterm3
                AND 
                deleted = 0
                ORDER BY 
                neighborhoods.name ASC';
        
        $stmt = static::$dbh->prepare($query);

        $params = array(
            ':searchterm1' => "%{$searchterm}%",
            ':searchterm2' => "%{$searchterm}%",
            ':searchterm3' => "%{$searchterm}%"
        );

        $stmt->execute($params);

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }
    
    /**
     * function to resturn the result of one neighborhood
     * @param  $id neighborhood id
     * @return  Array one neighborhood
     */
    public function NeighborhoodOne($id)
    {
        $query = "SELECT * FROM neighborhoods 
                    WHERE hood_id = :id
                    AND deleted = 0";

        $stmt = static::$dbh->prepare($query);

        $params = array(
            ':id' => $id
        );

        $stmt->execute($params);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $result;
    }

    /**
     * function to add a neighborhood to the database based on admin input
     * @param array $post all required fields must be entered and validate to be inserted into db
     */
    public function add(array $post)
    {

        $query = "INSERT INTO neighborhoods
                (name, location, loc_code, description, img, rating_scale, police_station, fire_station, library, pool, prim_schools, sec_schools, churches, playgrounds, comm_centres, house_price_min, house_price_max)
                VALUES
                (:name, :location, :loc_code, :description, :img, :rating_scale, :police_station, :fire_station, :library, :pool, :prim_schools, :sec_schools, :churches, :playgrounds, :comm_centres, :house_price_min, :house_price_max)";

        $stmt = static::$dbh->prepare($query);

        $params = array(
            ':name' => $_POST['name'],
            ':location' => $_POST['location'],
            ':loc_code' => $_POST['loc_code'],
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

        return static::$dbh->lastInsertId();

    }

    /**
     * function to display MIN aggregate to show the minimum house price of all neighborhoods
     * @return decimal min house price
     */
    public function minPrice()
    {
        $query = "SELECT MIN(house_price_min) 
                    FROM neighborhoods 
                    WHERE deleted = 0";
        $stmt =  static::$dbh->query($query);
        $price = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $price;
    }

    /**
     * function to display MAX aggregate to show the minimum house price of all neighborhoods
     * @return decimal max house price
     */
    public function maxPrice()
    {
        $query = "SELECT MAX(house_price_max) 
                    FROM neighborhoods
                    WHERE deleted = 0";
        $stmt =  static::$dbh->query($query);
        $price = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $price;
    }

    public function delete(int $id)
    {
        $query = "UPDATE neighborhoods 
                    SET deleted = 1
                    WHERE hood_id = :hood_id";
        $stmt = static::$dbh->prepare($query);
        $params = array(
            ':hood_id' => $id
        );

        $result = $stmt->execute($params);

        return $result;
        
    }
}

