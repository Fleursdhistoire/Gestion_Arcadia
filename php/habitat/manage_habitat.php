<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $habitat_id = $_POST['habitat_id'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("UPDATE habitat SET nom = ?, description = ? WHERE habitat_id = ?");
    $stmt->bind_param("ssi", $nom, $description, $habitat_id);
    if ($stmt->execute()) {
        echo "Habitat updated successfully.";
    } else {
        echo "Failed to update habitat.";
    }
}
?>
