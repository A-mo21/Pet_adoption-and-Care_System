<?php
// Include the database connection file
include 'db_connect.php';

// Start the session
include 'session.php';

// Fetch the user_id from the query string
$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

// Validate the user_id
if ($user_id <= 0) {
    die('Invalid User ID');
}

// Fetch the user's username for display
$user_query = $conn->prepare("SELECT username FROM users WHERE id = ?");
$user_query->bind_param("i", $user_id);
$user_query->execute();
$user_result = $user_query->get_result();

if ($user_result->num_rows == 0) {
    die('User not found.');
}

$user = $user_result->fetch_assoc();
$username = htmlspecialchars($user['username']);

// Fetch posts created by the user
$posts_query = $conn->prepare("SELECT * FROM adoptions WHERE user_id = ? ORDER BY id DESC");
$posts_query->bind_param("i", $user_id);
$posts_query->execute();
$posts_result = $posts_query->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Posts by <?php echo $username; ?></title>
    <link rel="stylesheet" href="card.css" />
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
</head>

<body>
    <?php include 'nav.php'; ?>

    <section class="available-adoptions">
        <h2 class="header1">Posts by <?php echo $username; ?></h2>
        <div class="adoption-cards">
            <?php
            // Function to display a single post card
            function displayCard($row)
            {
                $image = $row['image'];
                $category = $row['category'];
                $name = $row['name'];
                $location = $row['location'];
                $species = $row['species'];
                $age = $row['age'];
                $size = $row['size'];
                $vaccinated = $row['vaccinated'];
                $gender = $row['gender'];
                $neutered = $row['neutered'];
                $id = $row['id'];
                include 'card.php'; // This file contains the HTML structure for displaying a card
            }

            // Check if the user has any posts
            if ($posts_result->num_rows > 0) {
                while ($row = $posts_result->fetch_assoc()) {
                    displayCard($row);
                }
            } else {
                echo "<p>No posts available for this user at the moment.</p>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="updatebutton.js"></script>
</body>

</html>
