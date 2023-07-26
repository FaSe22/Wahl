<?php
require_once 'Connection.php';

// Verbindung zur Datenbank herstellen
$conn = (new Connection())->getConnection();

// Die Abfrage vorbereiten und ausführen, um Daten abzurufen
$query = "SELECT * FROM elections WHERE Kreis = 'Land Baden-Württemberg'";
$stmt = $conn->prepare($query);
$stmt->execute();

// Alle Zeilen als assoziatives Array abrufen
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Die Daten in das JSON-Format konvertieren und ausgeben
echo json_encode($data);

