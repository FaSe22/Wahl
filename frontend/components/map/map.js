// map.js

// Erstelle eine Karte Baden-Württembergs, auf der die Landkreise zu sehen sind
function createMap() {
    // Erstelle die Karte 
    const map = L.map('map', {
        center: [48.71, 9.10],
        zoom: 8,
        zoomControl: false, // Zoomen der Karte soll nicht möglich sein
    });

    // Lies die Daten aus der geo.json Datei,
    // Filter: Nur die Daten für das Bundesland Baden-Württemberg
    fetch('../../../data/kreise.geo.json')
        .then(response => response.json())
        .then(data => {
            // Filter die geo.json Daten nach Baden-Württemberg (NAME_1 = "Baden-Württemberg")
            const badenWurttembergData = data.features.filter(feature => feature.properties.NAME_1 === "Baden-Württemberg");

            // Erstelle ein Leaflet geoJson Layer für die Baden-Württemberg Daten und
            L.geoJSON(badenWurttembergData, {
                style: {
                    color: 'black', // Border color
                    weight: 0.5,     // Border weight
                },
                onEachFeature: function(feature, layer) {
                    // Füge dem Layer ein Popup, das die Stadt- oder Landkreisnamen anzeigt
                    // hinzu (NAME_3 = {Landkreis})
                    layer.bindPopup(feature.properties.NAME_3);
                }
            // füge es der Karte hinzu
            }).addTo(map);
        })
        .catch(error => {
            console.error('Error reading GeoJSON data:', error);
        });
}

// Erstelle die Karte erst nach laden der Seite
document.addEventListener('DOMContentLoaded', createMap);

