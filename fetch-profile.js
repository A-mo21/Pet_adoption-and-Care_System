// Get the modal
let modal = document.getElementById("userProfileModal");

// Get the <span> element that closes the modal
let closeModal = document.getElementById("closeModal");

// When the user clicks on the username, open the modal
document.querySelector('.username').addEventListener('click', function (event) {
    let userId = event.target.getAttribute('data-user-id'); // Get the user_id

    // Make AJAX request to fetch user profile
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'fetch-user-profile.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Inject the profile content into the modal
            document.getElementById('profile-container').innerHTML = xhr.responseText;
            modal.style.display = "block"; // Show the modal
        }
    };
    xhr.send('user_id=' + userId); // Send the user_id to the server
});

// When the user clicks on <span> (close button), close the modal
closeModal.onclick = function () {
    modal.style.display = "none"; // Hide the modal
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target === modal) {
        modal.style.display = "none"; // Hide the modal
    }
};
function viewPosts(userId) {
    // Redirect to the view-posts.php page with the user's ID
    window.location.href = 'view-posts.php?user_id=' + userId;
}
