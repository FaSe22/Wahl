// AJAX-Anfrage, um die Daten aus PHP zu erhalten
var xhr = new XMLHttpRequest();
xhr.open("GET", "../backend/balkendiagrammData.php", true);
xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
        var data = JSON.parse(xhr.responseText);
        console.log(data); // Log the received data to the console

        // Daten für das Balkendiagramm vorbereiten
        var parties = ['CDU', 'SPD', 'GRUENE', 'DIE_LINKE', 'AFD', 'FDP'];
        var votes = parties.map(party => data[0][party]);

        // Parteifarben entsprechend der deutschen Parteien
        var partyColors = [
            '#000000', // CDU (Schwarz)
            '#E3000F', // SPD (Rot)
            '#64A12D', // Die Grünen (Grün)
            '#BE3075', // Die Linke (Violett)
            '#009EE0', // AfD (Blau)
            '#FFED00'  // FDP (Gelb)
        ];

        // Balkendiagramm erstellen
        var ctx = document.getElementById('myBarChart').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: parties,
                datasets: [{
                    data: votes,
                    backgroundColor: partyColors,
                    borderColor: partyColors,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
};
xhr.send();

