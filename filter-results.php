<?php
// Database connection
include_once('db_connect.php');

// Initialize variables with default values
$type = isset($_GET['type']) ? $_GET['type'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';
$species = isset($_GET['species']) ? $_GET['species'] : '';
$location = isset($_GET['location']) ? $_GET['location'] : '';

// Build the SQL query
$sql = "SELECT * FROM adoptions WHERE 1=1";
if ($type) {
    $sql .= " AND action='$type'";
}
if ($category) {
    $sql .= " AND category='$category'";
}
if ($species) {
    $sql .= " AND species LIKE '%$species%'";
}
if ($location) {
    $sql .= " AND location LIKE '%$location%'";
}

// Execute the query and return the result
$result = $conn->query($sql);
return $result;
?>