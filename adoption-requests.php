<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PawPalace - Available Adoptions</title>
    <link rel="stylesheet" href="card.css" />
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
</head>

<body>
    <?php include 'nav.php'; ?>

    <section class="available-adoptions">
        <h2 class="header1">All Adoption Requests</h2>
        <div class="adoption-cards">
            <?php
            include_once('db_connect.php');
            $requests = $conn->query("SELECT * FROM adoptions WHERE action = 'adopt' ORDER BY id DESC");
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

                include 'card.php';
            }

            if ($requests->num_rows > 0) {
                while ($row = $requests->fetch_assoc()) {
                    displayCard($row);
                }
            } else {
                echo "<p>No Requests available at the moment.</p>";
            }

            $conn->close();
            ?>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <script src="updatebutton.js"></script>
</body>

</html>