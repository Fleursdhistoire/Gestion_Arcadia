<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $avis_id = $_POST['avis_id'];

    $stmt = $conn->prepare("UPDATE avis SET valide = TRUE WHERE avis_id = ?");
    $stmt->bind_param("i", $avis_id);
    if ($stmt->execute()) {
        echo "Review validated successfully.";
    } else {
        echo "Failed to validate review.";
    }
}
?>
