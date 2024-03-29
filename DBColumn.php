<?php
require_once './src/DB.php';
require_once 'DBRows.php';

class DBColumn extends DB
{
    public function createTableColumn()
    {
        $query = 'CREATE TABLE IF NOT EXISTS columns(id int PRIMARY KEY AUTO_INCREMENT, name varchar(35), id_row int)';
        return $this->mysqli->query($query);
    }

    public function fillTableColumn()
    {
        $this->createTableColumn();
        $name = "columns";
        fillTables($name);
    }
}