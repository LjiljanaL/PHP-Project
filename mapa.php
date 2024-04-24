<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="leaflet/leaflet.css" />
</head>
<body>
    <!-- Map container -->
    <div id="map" style="height: 200px;"></div>

    <!-- Leaflet JavaScript -->
    <script src="leaflet/leaflet.js"></script>
    <script>
        // Initialize the map
        var map = L.map('map').setView([45.379512, 20.382223], 12);

        // Add the tile layer (you can use different providers)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add a marker to the map
        L.marker([45.379512, 20.382223]).addTo(map)
            .bindPopup('TFZR').openPopup();
    </script>
</body>
</html>
