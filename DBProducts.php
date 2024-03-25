<?php
require_once './src/DB.php';
require_once 'DBColumn.php';

class DBProducts extends DB
{
    public function createTableProducts()
    {
        $query = 'CREATE TABLE IF NOT EXISTS prouducts(id int PRIMARY KEY AUTO_INCREMENT, name varchar(35), id_column int, min_qty int, quantity int, price int)';
        return $this->mysqli->query($query);
    }

    public function fillTableProducts()
    {
        $this->createTableProducts();
        $name = "products";
        fillTables($name);
    }
}