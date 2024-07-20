<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $habitat_id = $_POST['habitat_id'];
    $image_data = file_get_contents($_FILES['image_data']['tmp_name']);

    $stmt = $conn->prepare("INSERT INTO image (image_data) VALUES (?)");
    $stmt->bind_param("b", $image_data);
    if ($stmt->execute()) {
        $image_id = $stmt->insert_id;
        $stmt->close();

        $stmt = $conn->prepare("INSERT INTO habitat_images (habitat_id, image_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $habitat_id, $image_id);
        if ($stmt->execute()) {
            echo "Image added successfully.";
        } else {
            echo "Failed to link image to habitat.";
        }
    } else {
        echo "Failed to add image.";
    }
}
?>
