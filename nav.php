<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<nav>
  <div class="logo-container">
    <img src="assets/icon.png" alt="PawPalace Logo" class="logo-circle" />
    <a href="home.php">
      <h1>PawPalace</h1>
    </a>
  </div>
  <div class="nav-links">
    <i class="fas fa-search search-icon"></i>
    <a class="post-adoption2" href="post-adoption.php">Post Adoption</a>
    <a href="find-adoptions.php">Find Adoptions</a>
    <a href="healthcare.php">Healthcare</a>
    <div class="dropdown">
      <button class="dropbtn">
        Categories &#9662;
      </button>
      <div class="dropdown-content">
        <a href="categories/dog.php"><i class="fas fa-dog"></i> Dog</a>
        <a href="categories/cat.php"><i class="fas fa-cat"></i> Cat</a>
        <a href="categories/rabbit.php">
          <img class="rabbit" src="assets/rabbit3.svg" alt="Rabbit Icon"> Rabbit
        </a>

        <a href="categories/birds.php"><i class="fas fa-dove"></i> Birds</a>
        <a href="categories/other.php"><i class="fas fa-paw"></i> Other</a>

      </div>
    </div>
    <a href="service.php">Service</a>
    <a href="about.php">About</a>
  </div>

  <div class="nav-buttons">
    <button class="login1" onclick="window.location.href='login.php'">
      Login
    </button>
    <button class="signup1" onclick="window.location.href='signup.php'">
      Register
    </button>
  </div>
</nav>

<!-- Search Modal -->
<div id="searchModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Advanced Search</h2>
    <form action="search-results.php" method="GET">
      <!-- Category Filter -->
      <label for="category">Category:</label>
      <select name="category" id="category">
        <option value="dog">Dog</option>
        <option value="cat">Cat</option>
        <option value="rabbit">Rabbit</option>
        <option value="birds">Birds</option>
        <option value="other">Other</option>
      </select><br><br>

      <!-- Location Filter -->
      <label for="location">Location:</label>
      <input type="text" id="location" name="location" placeholder="Enter location"><br><br>

      <!-- Age Range Filter -->
      <label for="age">Age Range:</label>
      <input type="number" id="min-age" name="min-age" placeholder="Min age"> -
      <input type="number" id="max-age" name="max-age" placeholder="Max age"><br><br>

      <input type="submit" value="Search">
    </form>
  </div>
</div>


<script src="updatebutton.js"></script>
<script>

  document.querySelector('.dropbtn').addEventListener('click', function () {
    document.querySelector('.dropdown-content').classList.toggle('show');
  });


  window.onclick = function (event) {
    if (!event.target.matches('.dropbtn')) {
      let dropdowns = document.getElementsByClassName("dropdown-content");
      for (let i = 0; i < dropdowns.length; i++) {
        let openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
</script>
<script src="nav.js"></script>