// AJAX-Anfrage, um die Daten aus PHP zu erhalten
const xhr = new XMLHttpRequest();
xhr.open("GET", "../../../backend/piechartData.php", true);
xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
        const data = JSON.parse(xhr.responseText);

        // Daten für das Pie Chart vorbereiten
        const parties = ['CDU', 'SPD', 'GRUENE', 'DIE_LINKE', 'AFD', 'FDP'];
        const votes = parties.map(party => data[0][party]);

        // Parteifarben entsprechend der deutschen Parteien
        const partyColors = [
            '#000000', // CDU (Schwarz)
            '#E3000F', // SPD (Rot)
            '#64A12D', // Die Grünen (Grün)
            '#BE3075', // Die Linke (Violett)
            '#009EE0', // AfD (Blau)
            '#FFED00'  // FDP (Gelb)
        ];

        // Pie Chart erstellen
        const ctx = document.getElementById('myPieChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'pie',
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
                maintainAspectRatio: false
            }
        });
    }
};
xhr.send();

