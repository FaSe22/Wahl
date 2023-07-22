// AJAX-Anfrage, um die Daten aus PHP zu erhalten
$(document).ready(function() {
    $.ajax({
        url: "../backend/getTableData.php",
        type: "GET",
        dataType: "json",
        success: function(data) {
            console.log(data); // Log the received data to the console

            // Tabelle erstellen
            var tableHtml = '<table>';
            // Header Row
            tableHtml += '<tr>';
            for (var header in data[0]) {
                tableHtml += '<th>' + header + '</th>';
            }
            tableHtml += '</tr>';

            // Daten Rows
            for (var i = 0; i < data.length; i++) {
                tableHtml += '<tr>';
                for (var column in data[i]) {
                    tableHtml += '<td>' + data[i][column] + '</td>';
                }
                tableHtml += '</tr>';
            }
            tableHtml += '</table>';

            // Tabelle zum HTML-Container hinzufügen
            $("#tableContainer").html(tableHtml);
        },
        error: function(error) {
            console.log("Fehler beim Abrufen der Daten: " + error);
        }
    });
});

