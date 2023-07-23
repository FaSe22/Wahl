<?php

class Connection
{
    private $host;
    private $username;
    private $password;
    private $dbName;
    private $conn;

    public function __construct()
    {
        // Include the database configuration file
        $config = require 'config/database.php';

        // Get the database credentials from the config
        $this->host = $config['host'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->dbName = $config['dbName'];
    }

    public function getConnection()
    {
        if (!$this->conn) {
            try {
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->username, $this->password);
                // Set the PDO error mode to exception
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        return $this->conn;
    }
}

?>

