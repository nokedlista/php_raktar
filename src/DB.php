<?php

class DB
{
    protected $mysqli;

    function __construct($host = 'localhost', $user = 'root', $password = null)
    {
        $conn = $this->mysqli = mysqli_connect($host, $user, $password);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          
          // Create database
          $sql = "CREATE DATABASE IF NOT EXISTS raktarak";
          if ($conn->query($sql) === TRUE) {
            echo "Database created successfully";
          } else {
            echo "Error creating database: " . $conn->error;
          }
          
          $conn->close();
    }

    function __destruct()
    {
        $this->mysqli->close();
    }
}