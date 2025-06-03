<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PawPalace - Recent Posts</title>
    <link rel="stylesheet" href="card.css" />
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="filter.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
</head>

<body>
    <?php include 'nav.php'; ?>

    <section class="available-adoptions">
        <h2 class="header1">All Recent Posts</h2>
        <?php include 'filter.php';
        include_once('db_connect.php');

        // Initialize variables with default values
        $type = isset($_GET['type']) ? $_GET['type'] : '';
        $category = isset($_GET['category']) ? $_GET['category'] : '';
        $species = isset($_GET['species']) ? $_GET['species'] : '';
        $location = isset($_GET['location']) ? $_GET['location'] : '';

        // Build the SQL query
        // Build the SQL query
        $sql = "SELECT * FROM adoptions WHERE 1=1";
        if ($type) {
            $sql .= " AND action='$type'";
        }
        if ($category) {
            $sql .= " AND category='$category'";
        }
        if ($species) {
            $sql .= " AND species LIKE '%$species%'";
        }
        if ($location) {
            $sql .= " AND location LIKE '%$location%'";
        }

        // Ensure posts are always in descending order
        $sql .= " ORDER BY id DESC";

        // Execute the query and return the result
        $result = $conn->query($sql);

        ?>

        <div class="adoption-cards">

            <?php


            // If filtered results exist, display them
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    displayCard($row);
                }
            } else {
                // Fallback: Display all recent posts if no filtered results
                $requests = $conn->query("SELECT * FROM adoptions ORDER BY id DESC");
                if ($requests->num_rows > 0) {
                    while ($row = $requests->fetch_assoc()) {
                        displayCard($row);
                    }
                } else {
                    echo "<p>No Requests Posts available at this Moment.</p>";
                }
            }

            // Close the connection
            $conn->close();

            // Display Card Function
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
                include 'card.php';
            }


            ?>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <script src="updatebutton.js"></script>
</body>

</html>