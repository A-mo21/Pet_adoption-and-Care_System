document.addEventListener("DOMContentLoaded", () => {
  // Function to load dashboard data
  function loadDashboard() {
    fetch('healthcare_handler.php?action=get_dashboard&pet_name=Max')
      .then(res => res.json())
      .then(data => {
        // Populate appointments list
        const appList = document.getElementById('appointments-list');
        appList.innerHTML = data.appointments.map(app =>
          <li>${new Date(app.appointment_time).toLocaleString()} with ${app.vet}</li>
        ).join('');

        // Populate vaccination list
        const vacList = document.getElementById('vaccination-list');
        vacList.innerHTML = data.vaccinations.map(v =>
          <li>${v.vaccine_name} due on ${v.due_date}</li>
        ).join('');

        // Set health score
        document.getElementById('health-score').textContent = data.health_score + "%";
      })
      .catch(err => {
        console.error("Error loading dashboard data:", err);
      });
  }

  // Initial dashboard load
  loadDashboard();

  // Handle appointment form submission
  document.getElementById('appointment-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('healthcare_handler.php?action=book_appointment', {
      method: 'POST',
      body: formData
    })
      .then(res => res.json())
      .then(data => {
        alert(data.message);
        if (data.success) {
          // Reload dashboard to show new appointment
          loadDashboard();
          this.reset(); // Clear form
        }
      })
      .catch(err => {
        console.error("Error booking appointment:", err);
        alert('Failed to book appointment. Please try again.');
      });
  });
});
// Toggle Appointments list visibility
document.getElementById('appointments-card').addEventListener('click', () => {
  const list = document.getElementById('appointments-list');
  list.style.display = list.style.display === 'none' ? 'block' : 'none';
});
// Toggle Vaccination list
document.getElementById('vaccination-card').addEventListener('click', () => {
  const list = document.getElementById('vaccination-list');
  list.style.display = list.style.display === 'none' ? 'block' : 'none';
});
// Toggle Medication Schedule list
document.getElementById('medications-card').addEventListener('click', () => {
  const list = document.getElementById('medications-list');
  list.style.display = list.style.display === 'none' ? 'block' : 'none';
});