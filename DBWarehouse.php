<?php
require_once 'DB.php';

class DBWarehouse extends DB
{
    public function createTableWarehouse()
    {
        $query = 'CREATE TABLE IF NOT EXISTS warehouses(id int, name varchar(35), address varchar(35))';
        return $this->mysqli->query($query);
    }

    public function fillTableWarehouse()
    {
        $this->createTableWarehouse();
    }
}