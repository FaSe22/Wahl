<?php
require_once 'DB.php';

// Replace these variables with your actual database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$dbName = 'wahl';

// Create a new instance of the DB class and connect to the database
$db = new DB($host, $username, $password, $dbName);
$db->connect();
$conn = $db->getConn();

// Prepare and execute the query to fetch data
$query = "SELECT * FROM elections";
$stmt = $conn->prepare($query);
$stmt->execute();

// Fetch all rows as an associative array
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Convert the data to JSON format and output it
echo json_encode($data);
?>

