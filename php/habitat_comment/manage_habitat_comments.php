<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $habitat_id = $_POST['habitat_id'];
    $commentaire = $_POST['commentaire'];

    $stmt = $conn->prepare("INSERT INTO habitat_comment (habitat_id, commentaire) VALUES (?, ?)");
    $stmt->bind_param("is", $habitat_id, $commentaire);
    if ($stmt->execute()) {
        echo "Comment added successfully.";
    } else {
        echo "Failed to add comment.";
    }
}
?>
