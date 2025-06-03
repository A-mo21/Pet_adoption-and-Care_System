<nav>
  <div class="logo-container">
    <img src="assets/icon.png" alt="PawPalace Logo" class="logo-circle" />
    <a href="home.php">
      <h1>PawPalace</h1>
    </a>
  </div>
  <div class="nav-links">
    <input type="text" placeholder="Search..." />
    <a href="find-adoptions.php">Find Adoptions</a>
    <a href="articles.php">Articles</a>
    <div class="dropdown">
      <button class="dropbtn">Categories &#9662;</button>
      <div class="dropdown-content">
        <a href="categories/dog.php">Dog</a>
        <a href="categories/cat.php">Cat</a>
        <a href="categories/rabbit.php">Rabbit</a>
        <a href="categories/birds.php">Birds</a>
        <a href="categories/other.php">Other</a>
      </div>
    </div>
    <a href="store.php">Store</a>
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