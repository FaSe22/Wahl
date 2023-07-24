# Projektname (optional)

Beschreibung des Projekts (optional)


## Beschreibung

Dieses Projekt "Kombinierte Diagramme" ermöglicht die Darstellung verschiedener Diagrammtypen 
in Kombination mit einer interaktiven Karte von Baden-Württemberg. Die Anwendung zeigt Balkendiagramme, 
Kreisdiagramme und eine Tabelle mit Wählerdaten für verschiedene Land- und Stadtkreise in Baden-Württemberg. 
Dabei werden die Daten in Echtzeit aktualisiert, wenn ein bestimmter Land- oder Stadtkreis auf der Karte ausgewählt wird.



## Backend

- `backend/Connection.php`: PHP-Datei für die Verbindung zur Datenbank.
- `backend/DB.php`: PHP-Datei für die Datenbankabfragen und -operationen.
- `backend/config/database.php`: Konfigurationsdatei für die Datenbankverbindung.
- `backend/getTableData.php`: PHP-Datei zum Abrufen von Tabellendaten.
- `backend/piechartData.php`: PHP-Datei zum Abrufen von Daten für das Kreisdiagramm.

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

Um das Projekt zu nutzen, müssen Sie sicherstellen, dass die erforderlichen Datenbankverbindungsdaten in der backend/config/database.php Datei korrekt eingestellt sind. Anschließend können Sie die Anwendung starten, indem Sie die main.html im Browser öffnen.

Die Karte zeigt die Land- und Stadtkreise von Baden-Württemberg an. Wenn Sie auf einen bestimmten Kreis auf der Karte klicken, werden die entsprechenden Daten für das Balken- und Kreisdiagramm sowie die Tabelle aktualisiert und angezeigt.

Die Anwendung bietet eine intuitive Benutzeroberfläche, um die verschiedenen Diagramme zu interagieren und die Daten für ausgewählte Land- und Stadtkreise zu visualisieren.

## Autor

Name des Autors (optional).

## Lizenz

Informationen zur Lizenz des Projekts (optional).
