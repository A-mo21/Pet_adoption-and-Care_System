<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Health Care</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background: linear-gradient(to bottom right, #f0f9ff, #e0f7fa);
      color: #333;
      line-height: 1.6;
    }

    header {
      background-color: #00acc1;
      color: white;
      padding: 1rem;
      text-align: center;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    nav a {
      margin: 0 1rem;
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    nav a:hover {
      text-decoration: underline;
    }

    main {
      padding: 2rem;
      display: grid;
      gap: 2rem;
    }

    section {
      background: white;
      padding: 1.5rem;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card {
      background: #f1f9f9;
      padding: 1rem;
      border-radius: 10px;
      margin-bottom: 1rem;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    form input, form select, form button {
      display: block;
      margin: 0.5rem 0;
      padding: 0.5rem;
      width: 100%;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    form button {
      background-color: #00acc1;
      color: white;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    form button:hover {
      background-color: #007c91;
    }

    .profile-card {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .profile-card img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #00acc1;
    }

    footer {
      background-color: #00acc1;
      color: white;
      text-align: center;
      padding: 1rem;
      margin-top: 2rem;
    }
  </style>
</head>
<body>
  <header>
    <h1>Pet Healthcare</h1>
    <nav>
      <a href="#dashboard">Dashboard</a>
      <a href="#appointments">Appointments</a>
      <a href="#medications">Medications</a>
      <a href="#profile">Pet Profile</a>
    </nav>
  </header>

  <main>
    <section id="dashboard">
      <h2>Health Dashboard</h2>
      <div class="card">
       <div class="card" id="appointments-card" style="cursor: pointer;">
       <h3>Upcoming Appointments <span style="font-size: 0.8em;"></span></h3>
        <ul id="appointments-list" style="display: none;"></ul>
        </div>
      </div>
      <div class="card">
        <div class="card" id="vaccination-card" style="cursor: pointer;">
        <h3>Vaccination Tracker <span style="font-size: 0.8em;"></span></h3>
        <ul id="vaccination-list" style="display: none;"></ul>
        </div>
      </div>
      <div class="card">
        <h3>Health Score</h3>
        <p id="health-score">92%</p>
      </div>
    </section>

    <section id="appointments">
      <h2>Book Appointment</h2>
      <form id="appointment-form">
        <input type="text" name="pet_name" placeholder="Pet Name" required>
        <input type="datetime-local" name="appointment_time" required>
        <select name="vet">
          <option value="vet1">Dr. Smith</option>
          <option value="vet2">Dr. Kumar</option>
        </select>
        <button type="submit">Book Now</button>
      </form>
    <section id="medications">
     <div class="card" id="medications-card" style="cursor: pointer;">
      <h2>Medication Schedule <span style="font-size: 0.8em;"></span></h2>
      </div>
      <ul id="medications-list" style="display: none;"></ul>
     </section>
     <section id="profile">
      <h2>Pet Profile</h2>
      <div class="profile-card">
        <img src="pet.jpg" alt="Pet Photo">
        <div>
          <p><strong>Name:</strong> Max</p>
          <p><strong>Breed:</strong> Labrador</p>
          <p><strong>Age:</strong> 3 Years</p>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 UniquePaw+ | Pet Healthcare System</p>
  </footer>

  <script src="script.js"></script>
</body>
</html>