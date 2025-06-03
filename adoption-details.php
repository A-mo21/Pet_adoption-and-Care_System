<?php

include_once("db_connect.php");

if (isset($_GET['id'])) {

 $id = intval($_GET['id']);

 $result = $conn->query("SELECT * FROM adoptions WHERE id = $id");

 if ($result->num_rows > 0) {

 $post = $result->fetch_assoc();

 } else {

 die("Post not found.");

 }

} else {

 die("No post ID provided.");

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

 <meta charset="UTF-8">

 <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <title>Adoption Details</title>

 <link rel="stylesheet" href="details.css">

</head>

<body>

 <main class="details-container">

 <!-- 60% Section -->

 <div class="details-info">

 <img src="<?php echo $post['image']; ?>" alt="Pet Image" />

 <h3>Category: <?php echo $post['category']; ?></h3>

 <p>Name: <?php echo $post['name']; ?></p>

 <p>Location: <?php echo $post['location']; ?></p>

 <p>Species: <?php echo $post['species']; ?></p>

 <p>Age: <?php echo $post['age']; ?></p>

 <p>Size: <?php echo $post['size']; ?></p>

 <p>Vaccinated: <?php echo $post['vaccinated']; ?></p>

 <p>Gender: <?php echo $post['gender']; ?></p>

 <p>Neutered/Spayed: <?php echo $post['neutered']; ?></p>

 </div>

 <!-- 40% Section -->

 <div class="details-extra">

 <div id="map"></div>

 <div id="chatbox">

 <h3>Chat with Poster</h3>

 <textarea placeholder="Type your message here..."></textarea>

 <button>Send</button>

 </div>

 </div>

 </main>

 <script src="map.js"></script>

 <script>

 // Load Google Maps API or similar to display the location

 function initMap() {

 var location = { lat: <?php echo $post['latitude']; ?>, lng: <?php echo $post['longitude']; ?> };

 var map = new google.maps.Map(document.getElementById('map'), { zoom: 12, center: location });

 new google.maps.Marker({ position: location, map: map });

 }

 </script>

 <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>

</body>

</html>
