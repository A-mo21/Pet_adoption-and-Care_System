<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup</title>
    <link rel="stylesheet" href="signup.css" />
    <link rel="stylesheet" href="nav.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
  </head>

  <body>
   
    <?php include 'nav.php'; ?>
    <main>
      <div class="hero">
        <div class="signup-container">
          <img src="assets/logo.png" alt="PawPalace Logo" class="signup-logo" />
          <h2>Signup</h2>
          <form action="signupdo.php" method="POST">
            <div class="input-group">
              <label for="first-name">First Name:</label>
              <input
                type="text"
                id="first-name"
                placeholder="Enter your first name"
                name="first-name"
                required
              />
            </div>
            <div class="input-group">
              <label for="last-name">Last Name:</label>
              <input
                type="text"
                id="last-name"
                placeholder="Enter your last name"
                name="last-name"
                required
              />
            </div>
            <div class="input-group">
              <label for="email">Email:</label>
              <input
                type="email"
                id="email"
                placeholder="Enter your email"
                name="email"
                required
              />
            </div>
            <div class="input-group">
              <label for="username">Username:</label>
              <input
                type="text"
                id="username"
                placeholder="Enter your username"
                name="username"
                required
              />
            </div>
            <div class="input-group">
              <label for="password">Password:</label>
              <input
                type="password"
                id="password"
                placeholder="Enter password"
                name="password"
                minlength="6"
                required
              />
            </div>
            <div class="input-group">
              <label for="re-password">Re-enter Password:</label>
              <input
                type="password"
                id="re-password"
                placeholder="Re-enter password"
                name="re-password"
                minlength="6"
                required
              />
            </div>
            <div class="btn-group">
              <button type="submit">Continue</button>
              <button type="button" onclick="window.location.href='home.php'">
                Cancel
              </button>
            </div>
            <div class="terms">
              By clicking Continue, you agree to our
              <a href="terms.php" class="terms-link">Terms and Services</a>.
            </div>
          </form>
        </div>
      </div>
    </main>

    <script src="signup.js"></script>
  </body>
</html>