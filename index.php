<?php

// FUNKTIONEN
    // Funktion zum Parsen einer CSV-Datei
    function parseCSVFile($filePath)
    {
        $data = array();
        $file = fopen($filePath, 'r');
    
        // Zeichenkodierung auf UTF-8 setzen
        stream_filter_append($file, 'convert.iconv.ISO-8859-1/UTF-8');
    
        $header = fgetcsv($file, 0, ';'); // Lese die Kopfzeile
    
        // Ersetze Sonderzeichen, Umlaute und Leerzeichen in der Kopfzeile
        $header = array_map(function ($column) {
            $column = str_replace(['(', ')', '/', '§', 'ß', '.'], '', $column);
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
    
    // TODO: Hier die Connection.php aus dem Backend nutzen
    // Funktion zum Einfügen der Daten in eine SQL-Tabelle
    function insertDataIntoSQL($parsedData, $tableName, $dbConnection)
    {
        $columns = implode(', ', array_keys($parsedData[0]));
        $placeholders = rtrim(str_repeat('?, ', count($parsedData[0])), ', ');
    
        $stmt = $dbConnection->prepare("INSERT INTO $tableName ($columns) VALUES ($placeholders)");
    
        foreach ($parsedData as $row) {
            try {
                $stmt->execute(array_values($row));
            } catch (PDOException $e) {
                echo "Fehler: " . $e->getMessage() . "\n";
                print_r($row); // Nur zum Debuggen. 
                die(); 
            }
        }
    }

// PROGRAMMABLAUF
$parsedData = parseCSVFile("data/Kreise.csv");

try {
    require_once 'backend/Connection.php';

    // Verbindung zur Datenbank herstellen
    $conn = (new Connection())->getConnection();

    // Funktion aufrufen, um die Daten in die SQL-Tabelle einzufügen
    insertDataIntoSQL($parsedData, 'elections', $conn);

    echo "Daten erfolgreich in die Tabelle elections eingefügt!";
} catch (PDOException $e) {
    echo "Fehler: " . $e->getMessage();
}
?>

