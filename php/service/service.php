<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO service (nom, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $nom, $description);

    if ($stmt->execute()) {
        echo "Service added successfully.";
    } else {
        echo "Failed to add service.";
    }

    $stmt->close();
    $conn->close();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
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
}
?>
