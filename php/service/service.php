<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $service_id = $_POST['service_id'];
    $stmt = $conn->prepare("SELECT * FROM service WHERE service_id = ?");
    $stmt->bind_param("i", $service_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $service = $result->fetch_assoc();
    echo json_encode($service);
}
?>
