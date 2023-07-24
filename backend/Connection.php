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
        // Datenbankkonfigurationsdatei einbinden
        $config = require 'config/database.php';

        // Datenbank-Anmeldeinformationen aus der Konfiguration erhalten
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
                // PDO-Fehlermodus auf Ausnahme setzen
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Verbindung fehlgeschlagen: " . $e->getMessage());
            }
        }
        return $this->conn;
    }
}

?>

