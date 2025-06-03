<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Post</title>
    <link rel="stylesheet" href="card-detail.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="footer.css">
</head>

<body>

    <?php
    include "nav.php";
    include_once('db_connect.php'); // Include your database connection
    
    // Check if the ID is set in the POST request
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Fetch the post details from the database using the ID
        $stmt = $conn->prepare("SELECT * FROM adoptions WHERE id = ?");
        $stmt->bind_param("i", $id); // Assuming id is an integer
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the result exists
        if ($result->num_rows > 0) {
            $post = $result->fetch_assoc(); // Fetch the details
    

            $userId = $post['user_id']; // Assuming 'user_id' is a column in the 'adoptions' table
            $userStmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
            $userStmt->bind_param("i", $userId);
            $userStmt->execute();
            $userResult = $userStmt->get_result();
            $user = $userResult->fetch_assoc();
            ?>

            <div class="container">
                <!-- Left Side (70%) -->
                <div class="content-left">
                    <div class="card-img"><img src="<?php echo htmlspecialchars($post['image']); ?>"
                            alt="<?php echo htmlspecialchars($post['name']); ?>" />
                    </div>
                    <h1 class="pet-name"><?php echo htmlspecialchars($post['name']); ?></h1>

                    <div class="info-container">
                        <div class="post-details">
                            <div class="post-description">
                                <!-- <h3>Description</h3> -->
                                <p><?php echo nl2br(htmlspecialchars($post['description'])); ?></p>
                            </div>
                            <div class="post-detail">
                                <span>Category:</span>
                                <p><?php echo htmlspecialchars($post['category']); ?></p>
                            </div>

                            <div class="post-detail">
                                <span>Location:</span>
                                <p><?php echo htmlspecialchars($post['location']); ?></p>
                            </div>

                            <div class="post-details-grid">
                                <div class="post-detail">
                                    <span>Species:</span>
                                    <p><?php echo htmlspecialchars($post['species']); ?></p>
                                </div>

                                <div class="post-detail">
                                    <span>Age:</span>
                                    <p><?php echo htmlspecialchars($post['age']); ?></p>
                                </div>

                                <div class="post-detail">
                                    <span>Size:</span>
                                    <p><?php echo htmlspecialchars($post['size']); ?></p>
                                </div>

                                <div class="post-detail">
                                    <span>Vaccinated:</span>
                                    <p><?php echo htmlspecialchars($post['vaccinated']); ?></p>
                                </div>

                                <div class="post-detail">
                                    <span>Gender:</span>
                                    <p><?php echo htmlspecialchars($post['gender']); ?></p>
                                </div>

                                <div class="post-detail">
                                    <span>Neutered/Spayed:</span>
                                    <p><?php echo htmlspecialchars($post['neutered']); ?></p>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>

                <!-- Right Side (30%) -->
                <div class="content-right">
                    <!-- Map section -->
                    <div class="map">
                        <iframe
                            src="https://maps.google.com/maps?q=<?php echo urlencode($post['location']); ?>&output=embed"></iframe>
                    </div>

                    <!-- Chat section -->
                    <div class="chat-box">
                        <h2>
                            Chat with
                            <?php echo htmlspecialchars($post['username']); ?>
                        </h2>

                        <textarea placeholder="Write your message..."></textarea>
                        <button>Send Message</button>
                    </div>


                    <div class="user-info">
                        <div class="user-profile">
                            <div><img src="<?php echo htmlspecialchars($user['profile_picture']); ?>" alt="Profile Picture">
                            </div>
                            <!-- Remove the link and make the username clickable for modal -->
                            <div class="visit-profile"><a href="javascript:void(0);" class="username"
                                    data-user-id="<?php echo htmlspecialchars($post['user_id']); ?>"><?php echo htmlspecialchars($post['username']); ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                        color="#000000" fill="none">
                                        <path
                                            d="M11.0991 3.00012C7.45013 3.00669 5.53932 3.09629 4.31817 4.31764C3.00034 5.63568 3.00034 7.75704 3.00034 11.9997C3.00034 16.2424 3.00034 18.3638 4.31817 19.6818C5.63599 20.9999 7.75701 20.9999 11.9991 20.9999C16.241 20.9999 18.3621 20.9999 19.6799 19.6818C20.901 18.4605 20.9906 16.5493 20.9972 12.8998"
                                            stroke="#007bff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M20.556 3.49612L11.0487 13.0586M20.556 3.49612C20.062 3.00151 16.7343 3.04761 16.0308 3.05762M20.556 3.49612C21.05 3.99074 21.0039 7.32273 20.9939 8.02714"
                                            stroke="#007bff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Modal for user profile -->
            <div id="userProfileModal" class="modal">
                <div class="modal-content2">
                    <span class="close-btn" id="closeModal">&times;</span>
                    <div id="profile-container"></div> <!-- Content will be injected here -->
                </div>
            </div>

            <?php
        } else {
            echo "<p>No post found.</p>";
        }

        $stmt->close();
    } else {
        echo "<p>No ID provided.</p>";
    }

    $conn->close();
    include 'footer.php';
    ?>


</body>
<script src="updatebutton.js"></script>
<script src="fetch-profile.js"></script>

</html>