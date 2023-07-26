# Wahl

Demo einer Wahlapp

## Beschreibung

Dieses Projekt "Kombinierte Diagramme" ermöglicht die Darstellung verschiedener Diagrammtypen 
in Kombination mit einer interaktiven Karte von Baden-Württemberg. Die Anwendung zeigt Balkendiagramme, 
Kreisdiagramme und eine Tabelle mit Wählerdaten für verschiedene Land- und Stadtkreise in Baden-Württemberg. 
Dabei werden die Daten in Echtzeit aktualisiert, wenn ein bestimmter Land- oder Stadtkreis auf der Karte ausgewählt wird.



## Backend

- `backend/Connection.php`: PHP-Datei für die Verbindung zur Datenbank.
- `backend/config/database.php`: Konfigurationsdatei für die Datenbankverbindung.
- `backend/getTableData.php`: PHP-Datei zum Abrufen von Tabellendaten.
- `backend/piechartData.php`: PHP-Datei zum Abrufen von Daten für das Kreisdiagramm (und Balkendiagramm).

## Daten

- `data/Kreise.csv`: CSV-Datei mit Daten für das Projekt.
- `data/create_elections_table.sql`: SQL-Datei zum Erstellen der Wählerdatenbanktabelle.
- `data/kreise.geo.json`: GeoJSON-Datei mit Geodaten der Land- und Stadtkreise in Baden-Württemberg.

## Frontend

- `frontend/components/barchart/`: Verzeichnis mit Komponenten für das Balkendiagramm.
- `frontend/components/map/`: Verzeichnis mit Komponenten für die Karte.
- `frontend/components/piechart/`: Verzeichnis mit Komponenten für das Kreisdiagramm.
- `frontend/components/table/`: Verzeichnis mit Komponenten für die Tabelle.
- `frontend/main.html`: Haupt-HTML-Datei des Frontend.
- `frontend/main.js`: JavaScript-Datei mit Hauptfunktionen des Frontend.
- `frontend/styles.css`: CSS-Datei für das Styling des Frontend.

## Anleitung zur Verwendung

### Voraussetzungen:
SQL, PHP

### Starten des Projekts mit
php -S localhost:8000

Dann localhost:8000 EINMAL!! aufrufen. Das führt dazu, dass die Daten aus der CSV Datei in die 
SQL Datenbank geschrieben werden.

Anschließend http://localhost:8000/frontend/main.html aufrufen
Für die Karte http://localhost:8000/frontend/components/map/map.html aufrufen. 

## Lizenz

Informationen zur Lizenz des Projekts (optional).
