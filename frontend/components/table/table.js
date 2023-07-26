// Nutze Ajax um Daten von PHP zu empfangen.
var xhr = new XMLHttpRequest();
xhr.open("GET", "../../../backend/getTableData.php", true);
xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
        var data = JSON.parse(xhr.responseText);
        displayTableData(data);
    }
};
xhr.send();

// Zeige die Daten in einer Table an
function displayTableData(data) {
    var table = document.getElementById("electionsTable");

    //  Iteriere über die Daten und füge diese jeweils in einer Zeile hinzu 
    data.forEach(function(rowData) {
        for (var key in rowData) {
            var row = table.insertRow();
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML = key;
            cell2.innerHTML = rowData[key];
        }
    });
}

