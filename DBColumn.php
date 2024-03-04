<?php
require_once 'DB.php';
require_once 'DBRows.php';

class DBColumn extends DB
{
    public function createTableColumn()
    {
        $query = 'CREATE TABLE IF NOT EXISTS columns(id int, name varchar(35), id_row int)';
        return $this->mysqli->query($query);
    }

    public function fillTableColumn()
    {
        $this->createTableColumn();
    }
}