<?php
include_once('db_connect.php'); // Add this line
$host = 'localhost';
$db = 'pawpalace';
$user = 'root';
$pass = 'Password';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Add Service
if (isset($_POST['add_service'])) {
    $name = $_POST['service_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "INSERT INTO services (service_name, description, price)
            VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssd", $name, $description, $price);

    if ($stmt->execute()) {
        echo "Service added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Handle Delete Service
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM services WHERE service_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Service deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Fetch and display services
$sql = "SELECT * FROM services";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Service Management</title>
    <link rel="stylesheet" type="text/css" href="service.css">
</head>
<body>
    <h2>Add New Service</h2>
    <form method="POST" action="service.php">
        <input type="text" name="service_name" placeholder="Service Name" required><br>
        <textarea name="description" placeholder="Description" required></textarea><br>
        <input type="number" step="0.01" name="price" placeholder="Price" required><br>
        <input type="submit" name="add_service" value="Add Service">
    </form>

    <h2>Available Services</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Service Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['service_id'] ?></td>
            <td><?= $row['service_name'] ?></td>
            <td><?= $row['description'] ?></td>
            <td><?= $row['price'] ?></td>
            <td><a href="service.php?delete=<?= $row['service_id'] ?>" onclick="return confirm('Delete this service?')">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>