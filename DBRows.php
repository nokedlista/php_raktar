<?php
require_once './src/DB.php';
require_once 'DBWarehouse.php';

class DBRows extends DB
{
    public function createTableRows()
    {
        $query = 'CREATE TABLE IF NOT EXISTS `rows`(id int PRIMARY KEY AUTO_INCREMENT, name varchar(35), id_store int)';
        return $this->mysqli->query($query);
    }

    public function fillTableRows()
    {
        $this->createTableRows();
        $name = "rows";
        fillTables($name);
    }
}