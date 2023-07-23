<?php
require_once 'Connection.php';

$conn = (new Connection())->getConnection();

// Prepare and execute the query to fetch data
$query = "SELECT * FROM elections where Kreis = 'Land Baden-Württemberg'";
$stmt = $conn->prepare($query);
$stmt->execute();

// Fetch all rows as an associative array
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Convert the data to JSON format and output it
echo json_encode($data);
?>

