<?php

require_once 'Connection.php';

$dbConnection = (new Connection())->getConnection();

$stmt = $dbConnection->prepare("SELECT CDU, SPD, GRUENE, DIE_LINKE, AFD, FDP FROM elections WHERE Kreis = 'Land Baden-Württemberg'");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Response als JSON zurückgeben (ohne Unicode-Escaping)
header('Content-Type: application/json; charset=utf-8');
echo json_encode($results, JSON_UNESCAPED_UNICODE);

