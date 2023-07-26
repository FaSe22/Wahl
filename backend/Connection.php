<?php

class Connection
{
    private String $host;
    private String $username;
    private String $password;
    private String $dbName;
    private PDO $conn;

    public function __construct()
    {
        // Datenbankkonfigurationsdatei einbinden
        $config = require_once 'config/database.php';

        // Datenbank-Anmeldeinformationen aus der Konfiguration erhalten
        $this->host = $config['host'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->dbName = $config['dbName'];
    }

    public function getConnection(): PDO
    {
        if (!isset($this->conn)) {
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


