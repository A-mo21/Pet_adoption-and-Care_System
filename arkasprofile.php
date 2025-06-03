<div class="profile">
        <div class="profile-pic">
            <!-- Profile Picture -->
            <div class="img">
                <img src="<?php echo htmlspecialchars($profile_pic); ?>" alt="Profile Picture" class="profile-image">
            </div>
            <!-- Button to trigger file input -->
            <div class="cbtn">
                <button type="button" onclick="triggerFileInput()">Change Picture</button>
            </div>
        </div>
        <div class="info">
            <h1>
                <?php echo htmlspecialchars($firstname) . ' ' . htmlspecialchars($lastname); ?>
                <?php if ($status == 1): // Show green dot if user is online ?>
                    <span class="status-indicator" style="display: inline-block; background-color: #27d727; width: 10px; height: 10px; border-radius: 50%; margin-left: 10px;"></span>
                <?php endif; ?>
            </h1>
            <p class="designation">
                <?php echo htmlspecialchars($designation); ?>
                <a href="edit_designation.php">Edit</a>
            </p>
            <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($date_of_birth); ?></p>
            <p><strong>Age:</strong> <?php echo htmlspecialchars($age); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?>
                <a href="edit_email.php">Edit</a>
            </p>
            <p><strong>Food Preferences:</strong> 
                <div class="food-pref">
                    <?php echo htmlspecialchars($food_preferences); ?>
                </div>
                <a href="edit_food_preferences.php">Edit</a>
            </p>
            <a href="change_password.php" class="change-password">Change Password</a>
        </div>
        <!-- Form to handle file upload -->
        <form id="uploadForm" action="upload_picture.php" method="post" enctype="multipart/form-data" style="display: none;">
            <input type="file" id="fileInput" name="profile_pic" accept="image/*" onchange="document.getElementById('uploadForm').submit();">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
        </form>
    </div>

    <script>
        function triggerFileInput() {
            document.getElementById('fileInput').click();
        }
    </script>
    <script src="home1.js"></script>
    <script src="home.js"></script>
</body>
</html>