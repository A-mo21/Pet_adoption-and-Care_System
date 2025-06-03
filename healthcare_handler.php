<?php
$host = 'localhost';
$db = 'uniquepaw';
$user = 'root';
$pass = 'neha123';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection failed.']));
}

header('Content-Type: application/json');

switch ($_GET['action'] ?? '') {
    case 'get_dashboard':
        $pet_name = $_GET['pet_name'] ?? 'Max';

        // Appointments
        $appointments = [];
        $res1 = $conn->query("SELECT * FROM appointments WHERE pet_name='$pet_name' ORDER BY appointment_time ASC");
        while ($row = $res1->fetch_assoc()) {
            $appointments[] = $row;
        }

        // Vaccinations
        $vaccinations = [];
        $res2 = $conn->query("SELECT * FROM vaccinations WHERE pet_name='$pet_name' ORDER BY due_date ASC");
        while ($row = $res2->fetch_assoc()) {
            $vaccinations[] = $row;
        }

        // Health Score
        $res3 = $conn->query("SELECT score FROM health_scores WHERE pet_name='$pet_name' ORDER BY id DESC LIMIT 1");
        $health_score = $res3->fetch_assoc()['score'] ?? 90;

        echo json_encode([
            'appointments' => $appointments,
            'vaccinations' => $vaccinations,
            'health_score' => $health_score
        ]);
        break;

    case 'book_appointment':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pet_name = $_POST['pet_name'];
            $appointment_time = $_POST['appointment_time'];
            $vet = $_POST['vet'];

            $stmt = $conn->prepare("INSERT INTO appointments (pet_name, appointment_time, vet) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $pet_name, $appointment_time, $vet);

            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Appointment booked']);
            } else {
                echo json_encode(['success' => false, 'message' => $stmt->error]);
            }
            $stmt->close();
        }
        break;

    case 'get_medications':
        $pet_name = $_GET['pet_name'] ?? 'Max';
        $result = $conn->query("SELECT * FROM medications WHERE pet_name='$pet_name' ORDER BY schedule_time ASC");
        $medications = [];
        while ($row = $result->fetch_assoc()) {
            $medications[] = $row;
        }
        echo json_encode(['medications' => $medications]);
        break;

    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action.']);
}

$conn->close();
?>