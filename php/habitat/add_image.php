<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $habitat_id = $_POST['habitat_id'];
    $image_path = $_POST['image_path'];

    $stmt = $conn->prepare("INSERT INTO habitat_images (habitat_id, image_path) VALUES (?, ?)");
    $stmt->bind_param("is", $habitat_id, $image_path);
    if ($stmt->execute()) {
        echo "Image added successfully.";
    } else {
        echo "Failed to add image.";
    }
}
?>
