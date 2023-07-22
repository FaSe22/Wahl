<?php

function parseCSVFile($filePath)
{
    $data = array();
    $file = fopen($filePath, 'r');

    // Set character encoding to UTF-8
    stream_filter_append($file, 'convert.iconv.ISO-8859-1/UTF-8');


    $header = fgetcsv($file, 0, ';'); // Read the header row

    // Replace special characters, umlauts, and spaces in the header
    $header = array_map(function ($column) {
        $column = str_replace(['(', ')', '/', '§', 'ß','.'], '', $column);
        $column = strtr($column, ['ä' => 'ae', 'ö' => 'oe', 'ü' => 'ue', 'Ä' => 'Ae', 'Ö' => 'Oe', 'Ü' => 'Ue']);
        $column = preg_replace('/[^A-Za-z0-9_]/', '_', $column);
        return trim($column, "_");
    }, $header);

    while (($row = fgetcsv($file, 0, ';')) !== false) {
        $rowData = array_combine($header, $row);
        $data[] = $rowData;
    }

    fclose($file);
    return $data;
}

// Function to insert data into SQL table
function insertDataIntoSQL($parsedData, $tableName, $dbConnection)
{
    $columns = implode(', ', array_keys($parsedData[0]));
    $placeholders = rtrim(str_repeat('?, ', count($parsedData[0])), ', ');

    $stmt = $dbConnection->prepare("INSERT INTO $tableName ($columns) VALUES ($placeholders)");

    foreach ($parsedData as $row) {
        try {
            $stmt->execute(array_values($row));
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "\n";
            print_r($row); // Print the problematic row for debugging
            die(); // Stop execution to investigate the issue
        }
    }
}

// Usage example:
$csvFilePath = "data/Kreise.csv";
$parsedData = parseCSVFile($csvFilePath);

// Database configuration
$host = 'localhost';
$dbName = 'wahl';
$username = 'root';
$password = '';
$tableName = 'elections';

try {
    $dbConnection = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Call the function to insert data into the SQL table
    insertDataIntoSQL($parsedData, $tableName, $dbConnection);

    echo "Data inserted successfully into the $tableName table!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

