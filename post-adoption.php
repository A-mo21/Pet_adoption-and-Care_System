<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Adoption - PawPalace</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="post-adoption.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
</head>

<body>
    <?php include 'nav.php';
    include 'session.php'; ?>
    <h1>Post Adoption</h1>
    <form action="submit-adoption.php" method="post" enctype="multipart/form-data">
        <label for="action-select">Action:</label>
        <select id="action-select" name="action-select">
            <option value="donate">Donate Pet</option>
            <option value="adopt">Adopt Pet</option>
        </select>

        <label for="category">Category:</label>
        <select id="category" name="category" required>
            <option value="Dog">Dog</option>
            <option value="Cat">Cat</option>
            <option value="Bird">Bird</option>
            <option value="Rabbit">Rabbit</option>
            <option value="Other">Other</option>
        </select>

        <label for="name">Name of Pet:</label>
        <input type="text" id="name" name="name">

        <!-- <label for="location">Location:</label>
        <input type="text" id="location" name="location" required> -->

        <label for="location">Location:</label>
        <div style="display: flex; gap: 10px; align-items: center;">
            <input type="text" class="cur-loc" id="location" name="location" required>
            <button type="button" id="detect-location" style="cursor: pointer;">Detect Location</button>
        </div>
        <p id="location-status" style="color: gray; font-size: 0.9em;"></p>


        <label for="species">Species:</label>
        <input type="text" id="species" name="species">

        <label for="age">Age:</label>
        <input type="text" id="age" name="age">

        <label for="size">Size:</label>
        <input type="text" id="size" name="size">

        <label for="vaccinated">Vaccinated:</label>
        <select id="vaccinated" name="vaccinated">
            <option value="N/A">N/A</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <label for="neutered">Neutered/Spayed:</label>
        <select id="neutered" name="neutered">
            <option value="N/A">N/A</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea>

        <label for="image">Pet Image:</label>
        <input type="file" id="image" name="image" accept="image/*">
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
        <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">

        <button type="submit">Post</button>
    </form>
    <script src="updatebutton.js"></script>
    <script src="location.js"></script>
</body>

</html>