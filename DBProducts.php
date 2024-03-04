<?php
require_once 'DB.php';
require_once 'DBColumn.php';

class DBProducts extends DB
{
    public function createTableProducts()
    {
        $query = 'CREATE TABLE IF NOT EXISTS prouducts(id int, name varchar(35), id_column int, min_qty int, quantity int, price int)';
        return $this->mysqli->query($query);
    }

    public function fillTableProducts()
    {
        $this->createTableProducts();
        // $result = $this->mysqli->query("SELECT * FROM cities");
        // $row = $result->fetch_array(MYSQLI_NUM);
        // $errors = [];
        // $isFirst = true;
        // if (empty($row)) {
        //     foreach ($data as $city) {
        //         if ($isFirst) {
        //             $isFirst = false;
        //             continue;
        //         }
        //         if (isset($city[0]) && isset($city[1]) && isset($city[2])) {
        //             $insert = $this->mysqli->query("INSERT INTO cities VALUES ('$city[0]', '$city[1]', '$city[2]')");
        //             if (!$insert) {
        //                 $errors[] = $city[0];
        //             }
        //         }

        //     }
        // }
        // return $errors;
    }
}