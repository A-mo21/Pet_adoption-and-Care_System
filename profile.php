<?php
// Include the database connection file
include 'db_connect.php';

// Start session to get the logged-in user's ID
include 'session.php';

$user_id = $_SESSION['user_id'];

// Fetch user data from the database
$query = "SELECT first_name, last_name, email, username, profile_picture, joined_date, privacy_settings, address, contact_number 
          FROM users 
          WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$privacy_settings = json_decode($user['privacy_settings'], true);

$is_own_profile = ($_SESSION['user_id'] == $user_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="footer.css">
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="profile-page">
        <div class="profile-card-left">
            <img src="<?php echo htmlspecialchars($user['profile_picture']); ?>" alt="Profile Picture"
                class="profile-pic">
            <h2 class="username"><?php echo htmlspecialchars($user['username']); ?></h2>
            <p class="joined-date">Joined since: <?php echo date('F Y', strtotime($user['joined_date'])); ?></p>
            <a href="user-posts.php?user_id=<?php echo $user_id; ?>" class="posts-btn">View Posts</a>
            <!-- Posts Button -->
        </div>
        <div class="profile-card-right">
            <div class="user-details">
                <p><strong>Name:</strong>
                    <?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                <p><strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></p>
                <p><strong>Contact Number:</strong> <?php echo htmlspecialchars($user['contact_number']); ?></p>
                <?php if ($is_own_profile): ?>
                    <!-- Edit Profile Button -->
                    <button id="editProfileBtn" class="edit-btn">Edit Profile</button>
                <?php endif; ?>
            </div>

            <form class="profile-form hidden" method="POST" action="update-profile.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Update Profile Picture</label>
                    <input type="file" name="profile-picture" accept="image/*">
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first-name" value="<?php echo htmlspecialchars($user['first_name']); ?>">
                    <input type="checkbox" name="public-first-name" <?php echo isset($privacy_settings['first_name']) && $privacy_settings['first_name'] ? 'checked' : ''; ?>> Public
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last-name" value="<?php echo htmlspecialchars($user['last_name']); ?>">
                    <input type="checkbox" name="public-last-name" <?php echo isset($privacy_settings['last_name']) && $privacy_settings['last_name'] ? 'checked' : ''; ?>> Public
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
                    <input type="checkbox" name="public-email" <?php echo isset($privacy_settings['email']) && $privacy_settings['email'] ? 'checked' : ''; ?>> Public
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" value="<?php echo htmlspecialchars($user['address']); ?>">
                    <input type="checkbox" name="public-address" <?php echo isset($privacy_settings['address']) && $privacy_settings['address'] ? 'checked' : ''; ?>> Public
                </div>
                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" name="contact-number"
                        value="<?php echo htmlspecialchars($user['contact_number']); ?>">
                    <input type="checkbox" name="public-contact-number" <?php echo isset($privacy_settings['contact_number']) && $privacy_settings['contact_number'] ? 'checked' : ''; ?>> Public
                </div>
                <div class="form-actions">
                    <button type="submit" class="edit-profile-btn">Update</button>
                    <!-- Cancel Button -->
                    <button type="button" id="cancelBtn" class="cancel-btn">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="updatebutton.js"></script>
    <script src="profile.js"></script>
</body>

</html>