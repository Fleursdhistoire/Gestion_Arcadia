<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $animal_id = $_POST['animal_id'];
    $date = $_POST['date'];
    $detail = $_POST['detail'];

    $stmt = $conn->prepare("INSERT INTO rapport_veterinaire (animal_id, date, detail) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $animal_id, $date, $detail);
    if ($stmt->execute()) {
        echo "Report added successfully.";
    } else {
        echo "Failed to add report.";
    }
}
?>
