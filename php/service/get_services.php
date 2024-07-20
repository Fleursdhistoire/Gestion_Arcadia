<?php
include '../db.php';

$stmt = $conn->prepare("SELECT * FROM service");
$stmt->execute();
$result = $stmt->get_result();

$services = array();
while ($row = $result->fetch_assoc()) {
    $services[] = $row;
}

echo json_encode($services);

$stmt->close();
$conn->close();
?>
