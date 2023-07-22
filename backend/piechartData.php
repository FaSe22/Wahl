<?php

// Hier die Verbindung zur Datenbank erstellen und deine Datenbankkonfiguration angeben
$host = 'localhost';
$dbName = 'wahl';
$username = 'root';
$password = '';

try {
    // Verbindung zur Datenbank herstellen mit UTF-8 Zeichensatz
    $dbConnection = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Die benötigten Spalten für das Pie Chart aus der Datenbank abrufen
    $stmt = $dbConnection->prepare("SELECT CDU, SPD, GRUENE, DIE_LINKE, AFD, FDP FROM elections WHERE Kreis = 'Land Baden-Württemberg'");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Response als JSON zurückgeben (ohne Unicode-Escaping)
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($results, JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

