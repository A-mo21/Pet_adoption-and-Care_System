<?php
// Include database connection
include_once("db_connect.php");

// Ensure the uploads directory exists
$target_dir = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

// Initialize variables
$original_file_name = basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($original_file_name, PATHINFO_EXTENSION));
$unique_file_name = time() . '_' . $original_file_name; // Add timestamp to file name
$target_file = $target_dir . $unique_file_name;
$image = "uploads/default.jpg"; // Default image path

// Prepare the SQL query to insert form data into the database
$stmt = $conn->prepare("INSERT INTO adoptions (category, name, location, species, age, size, vaccinated, gender, neutered, image, action, user_id, username, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssssss", $category, $name, $location, $species, $age, $size, $vaccinated, $gender, $neutered, $image, $action, $user_id, $username, $description);

// Get the form data
$category = $_POST['category'];
$name = !empty($_POST['name']) ? $_POST['name'] : 'Not Specified'; // Default to 'Not Specified' if name is not provided
$location = $_POST['location'];
$species = !empty($_POST['species']) ? $_POST['species'] : 'Not Specified'; // Default to 'Not Specified' if species is not provided
$age = !empty($_POST['age']) ? $_POST['age'] : 'Not Specified';
$size = !empty($_POST['size']) ? $_POST['size'] : 'Not Specified';
$vaccinated = !empty($_POST['vaccinated']) ? $_POST['vaccinated'] : 'Not Specified';
$gender = $_POST['gender'];
$neutered = !empty($_POST['neutered']) ? $_POST['neutered'] : 'Not Specified';
$action = $_POST['action-select'];
$user_id = $_POST['user_id']; // Get the user ID from the form data
$username = $_POST['username']; // Get the username from the form data

// Capture the description
$description = !empty($_POST['description']) ? $_POST['description'] : 'No description provided'; // Default description

// Move the file only if there's no error
$file_moved = false;

if (!empty($_FILES["image"]["name"])) {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image = $target_file; // Update image path to the uploaded file
        $file_moved = true;
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit; // Stop execution if file upload fails
    }
}

if ($stmt->execute()) {
    // If successful, redirect to home page
    header("Location: post-adoption.php"); // Redirect before any output
    exit; // Ensure no further code is executed after the redirect
} else {
    // If database operation fails, handle file clean-up and error reporting
    if ($file_moved) {
        unlink($target_file); // Delete the file if it was moved
    }
    echo "Error: " . $stmt->error;
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>
