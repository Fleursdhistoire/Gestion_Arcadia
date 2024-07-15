<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $animal_id = $_POST['animal_id'];

    $stmt = $conn->prepare("DELETE FROM animal WHERE animal_id = ?");
    $stmt->bind_param("i", $animal_id);
    if ($stmt->execute()) {
        echo "Animal deleted successfully.";
    } else {
        echo "Failed to delete animal.";
    }
}
?>
