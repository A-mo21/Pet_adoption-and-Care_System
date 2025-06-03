function updateButtonActions() {
    fetch('check_login.php')
        .then(response => response.json())
        .then(data => {
            if (data.logged_in) {

                document.querySelector(".login1").onclick = function () {
                    window.location.href = 'profile1.php';
                };
                document.querySelector(".signup1").onclick = function () {
                    window.location.href = 'logout.php';
                };

                document.querySelector(".login1").textContent = data.username;
                document.querySelector(".signup1").textContent = "Logout";

            } else {

                document.querySelector(".login1").onclick = function () {
                    window.location.href = 'login.php';
                };
                document.querySelector(".signup1").onclick = function () {
                    window.location.href = 'signup.php';
                };
            }
        });
}
document.addEventListener('DOMContentLoaded', updateButtonActions);