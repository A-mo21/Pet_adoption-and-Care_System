document.getElementById('detect-location').addEventListener('click', () => {
    const locationInput = document.getElementById('location');
    const locationStatus = document.getElementById('location-status');

    document.querySelector(".cur-loc").value = "Detecting your location..."; // Show message while detecting

    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                getPlaceName(latitude, longitude); // Get the place name after detecting location
            },
            (error) => {
                locationStatus.textContent = "Error detecting location."; // Show error message
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        alert("User denied the request for Geolocation.");
                        break;
                    case error.POSITION_UNAVAILABLE:
                        alert("Location information is unavailable.");
                        break;
                    case error.TIMEOUT:
                        alert("The request to get user location timed out.");
                        break;
                    case error.UNKNOWN_ERROR:
                        alert("An unknown error occurred.");
                        break;
                }
            }
        );
    } else {
        alert("Geolocation is not supported by this browser.");
        locationStatus.textContent = "Geolocation is not supported."; // Show message for unsupported browsers
    }
});

function getPlaceName(lat, lng) {
    const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&zoom=18&addressdetails=1`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const locationStatus = document.getElementById('location-status');
            if (data && data.address) {
                const placeName = data.display_name;
                document.querySelector(".cur-loc").value = placeName;
                console.log("Place name: ", placeName); // Log the place name
                // Use 'value' to set the input field value
            } else {
                locationStatus.textContent = "Failed to fetch location."; // Show error if geocoding fails
            }
        })
        .catch(error => {
            const locationStatus = document.getElementById('location-status');
            locationStatus.textContent = "Error fetching location."; // Show error if fetch fails
            console.error("Error fetching place name: ", error);
        });
}
