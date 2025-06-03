<?php
include 'db_connect.php';
include 'session.php';

$user_id = $_SESSION['user_id'];

// Fetch current user data, particularly for the existing profile picture
$query = "SELECT profile_picture FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$current_user = $result->fetch_assoc();

// Process form data
$username = $_POST['username']; // Add this line
$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$email = $_POST['email'];
$address = $_POST['address'];
$contact_number = $_POST['contact-number'];

// Handle privacy settings
$privacy_settings = [
    'first_name' => isset($_POST['public-first-name']) ? 1 : 0,
    'last_name' => isset($_POST['public-last-name']) ? 1 : 0,
    'email' => isset($_POST['public-email']) ? 1 : 0,
    'address' => isset($_POST['public-address']) ? 1 : 0,
    'contact_number' => isset($_POST['public-contact-number']) ? 1 : 0,
];
$privacy_settings_json = json_encode($privacy_settings);

// Handle profile picture upload
$profile_picture = $current_user['profile_picture']; // Default to the existing profile picture
if (!empty($_FILES['profile-picture']['name'])) {
    $target_dir = "profile_pictures/";

    // Generate a unique name for the uploaded file using a timestamp and original extension
    $file_extension = pathinfo($_FILES['profile-picture']['name'], PATHINFO_EXTENSION);
    $new_filename = uniqid('profile_', true) . '.' . $file_extension;
    $target_file = $target_dir . $new_filename;

    // Move uploaded file to the target directory
    if (move_uploaded_file($_FILES['profile-picture']['tmp_name'], $target_file)) {
        $profile_picture = $target_file; // Update the profile picture path
    }
}

// Update user info in the database
$query = "UPDATE users 
          SET username = ?, first_name = ?, last_name = ?, email = ?, address = ?, contact_number = ?, profile_picture = ?, privacy_settings = ?
          WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssssssssi", $username, $first_name, $last_name, $email, $address, $contact_number, $profile_picture, $privacy_settings_json, $user_id);
$stmt->execute();

// Redirect back to the profile page
header("Location: profile.php");
exit;
?>
