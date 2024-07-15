<?php
include '../db.php';

$stmt = $conn->prepare("SELECT * FROM service");
$stmt->execute();
$result = $stmt->get_result();
$services = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($services);
?>
