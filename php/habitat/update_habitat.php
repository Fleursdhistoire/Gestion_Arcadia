<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO habitat (nom, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $nom, $description);
    if ($stmt->execute()) {
        echo "Habitat added successfully.";
    } else {
        echo "Failed to add habitat.";
    }
}
?>
