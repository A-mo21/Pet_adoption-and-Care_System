function updateButtonActions() {
    fetch('check_login.php')
        .then(response => response.json())
        .then(data => {
            const postAdoptionButton = document.querySelector(".post-adoption2");

            // Remove default link behavior to control via JavaScript
            postAdoptionButton.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent default behavior
                
                // Check if the user is logged in
                if (data.logged_in) {
                    window.location.href = "post-adoption.php"; // Redirect if logged in
                } else {
                    window.location.href = "login.php"; // Redirect to login if not logged in
                }
            });
        })
        .catch(error => {
            console.error('Error checking login status:', error);
        });
}

// Ensure DOM is fully loaded before running the function
document.addEventListener('DOMContentLoaded', updateButtonActions);









// Open the modal when the search icon is clicked
document.querySelector('.search-icon').addEventListener('click', function () {
  document.getElementById('searchModal').style.display = 'block';
});

// Close the modal when the 'x' is clicked
document.querySelector('.close').addEventListener('click', function () {
  document.getElementById('searchModal').style.display = 'none';
});

// Close the modal when clicking outside of it
window.onclick = function (event) {
  const modal = document.getElementById('searchModal');
  if (event.target == modal) {
    modal.style.display = 'none';
  }
}
