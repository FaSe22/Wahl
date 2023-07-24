// map.js

// Function to create the map and load GeoJSON data
function createMap() {
    // Create the map
    var map = L.map('map', {
        center: [48.71, 9.10],
        zoom: 8,
        zoomControl: false, // Disable zoom control
    });

    // Read the GeoJSON data from the file
    fetch('../../../data/kreise.geo.json')
        .then(response => response.json())
        .then(data => {
            // Filter the GeoJSON data for Baden-Württemberg (NAME_1 = "Baden-Württemberg")
            var badenWurttembergData = data.features.filter(feature => feature.properties.NAME_1 === "Baden-Württemberg");

            // Create a Leaflet GeoJSON layer for Baden-Württemberg and add it to the map
            L.geoJSON(badenWurttembergData, {
                style: {
                    color: 'black', // Border color
                    weight: 0.5,     // Border weight
                },
                onEachFeature: function(feature, layer) {
                    // Add the name of the Stadt- or Landkreis to the map as a popup
                    layer.bindPopup(feature.properties.NAME_3);
                }
            }).addTo(map);
        })
        .catch(error => {
            console.error('Error reading GeoJSON data:', error);
        });
}

// Call the createMap function when the page has finished loading
document.addEventListener('DOMContentLoaded', createMap);

