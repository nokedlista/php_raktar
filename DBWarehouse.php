<?php
require_once './src/DB.php';

class DBWarehouse extends DB
{
    public function createTableWarehouse()
    {
        $query = 'CREATE TABLE IF NOT EXISTS warehouses(id int PRIMARY KEY AUTO_INCREMENT, name varchar(35), address varchar(35))';
        return $this->mysqli->query($query);
    }

    public function fillTableWarehouse()
    {
        $this->createTableWarehouse();
        $name = "warehouses";
        fillTables($name);
    }
}