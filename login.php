<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet" href="nav.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
  </head>

  <body>
    <?php include 'nav.php'; ?>

    <main>
      <div class="hero">
        <div class="login-container">
          <img src="assets/logo.png" alt="PawPalace Logo" class="login-logo" />
          <h2>Login</h2>
          <form action="logindo.php" method="POST">
            <div class="input-group">
              <label for="email">Email or Username:</label>
              <input
                type="text"
                id="email"
                placeholder="Enter your email/username"
                name="email"
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
                required
              />
            </div>
            <div class="btn-group">
              <button type="submit">Login</button>
              <button><a href="home.php">Cancel</a></button>
            </div>
            <div class="signup">
              Don't have an account?<a href="signup.html" class="sign-up-link">
                Sign up</a
              >
            </div>
            <div class="forgot-password">
              <a href="#">Forgot password?</a>
            </div>
          </form>
        </div>
      </div>
    </main>

    <script src="login.js"></script>
  </body>
</html>
