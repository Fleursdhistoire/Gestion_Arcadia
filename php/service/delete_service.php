<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $service_id = $_POST['service_id'];

    $stmt = $conn->prepare("DELETE FROM service WHERE service_id = ?");
    $stmt->bind_param("i", $service_id);

    if ($stmt->execute()) {
        echo "Service deleted successfully.";
    } else {
        echo "Failed to delete service.";
    }

    $stmt->close();
    $conn->close();
}
?>
