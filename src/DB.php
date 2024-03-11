<?php

class DB
{
    protected $mysqli;

    function createDatabase(){
      $this->mysqli = mysqli_connect('localhost', 'root', null);

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
          }
          
          // Create database
          $sql = "CREATE DATABASE IF NOT EXISTS raktarak";
          if (!$this->mysqli->query($sql) === TRUE) {
            echo "Error creating database: " . $this->mysqli->error;
          }
    }
    function __construct($host = 'localhost', $user = 'root', $password = null)
    {
        $this->mysqli = mysqli_connect($host, $user, $password, 'raktarak');

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
          }
    }

    function __destruct()
    {
        $this->mysqli->close();
    }

    
}