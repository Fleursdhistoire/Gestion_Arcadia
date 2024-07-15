<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $animal_id = $_POST['animal_id'];
    $stmt = $conn->prepare("SELECT * FROM animal WHERE animal_id = ?");
    $stmt->bind_param("i", $animal_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $animal = $result->fetch_assoc();
    echo json_encode($animal);
}
?>
