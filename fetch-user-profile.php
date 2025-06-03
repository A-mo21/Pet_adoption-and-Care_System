<?php
include 'db_connect.php';

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Fetch the user data from the database
    $stmt = $conn->prepare("SELECT first_name, last_name, email, username, profile_picture, joined_date, address, contact_number FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Return the HTML for the user profile in the modal
        echo "<div class='profile-page'>";
        echo "<div class='profile-card-left'>";
        echo "<img class='profile-pic' src='" . htmlspecialchars($user['profile_picture']) . "' alt='Profile Picture'>";

        echo "</div>"; // Close profile-card-left

        echo "<div class='profile-card-right'>";
        echo "<div class='user-details'>";
        echo "<div class='left-previous'>";
        echo "<h2 class='username'>" . htmlspecialchars($user['username']) . "</h2>";

        echo "<p><strong>Full Name:</strong> " . htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) . "</p>";
        echo "<p><strong>E-mail:</strong> " . htmlspecialchars($user['email']) . "</p>";
        echo "<p><strong>Address:</strong> " . htmlspecialchars($user['address']) . "</p>";
        echo "<p><strong>Contact Number:</strong> " . htmlspecialchars($user['contact_number']) . "</p>";
        echo "<p class='joined-date'><strong>Member Since:</strong> " . date('F Y', strtotime($user['joined_date'])) . "</p>";
        echo "<button class='view-posts-btn' onclick='viewPosts($user_id)'>View Posts</button>";

        echo "</div>";
        echo "</div>"; // Close user-details
        echo "</div>"; // Close profile-card-right
        echo "</div>"; // Close profile-page
    } else {
        echo "<p>Profile not found.</p>";
    }

    $stmt->close();
}
?>