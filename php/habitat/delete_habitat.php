<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $habitat_id = $_POST['habitat_id'];

    $stmt = $conn->prepare("DELETE FROM habitat WHERE habitat_id = ?");
    $stmt->bind_param("i", $habitat_id);
    if ($stmt->execute()) {
        echo "Habitat deleted successfully.";
    } else {
        echo "Failed to delete habitat.";
    }
}
?>
