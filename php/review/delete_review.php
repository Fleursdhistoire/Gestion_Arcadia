<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $avis_id = $_POST['avis_id'];

    $stmt = $conn->prepare("DELETE FROM avis WHERE avis_id = ?");
    $stmt->bind_param("i", $avis_id);
    if ($stmt->execute()) {
        echo "Review deleted successfully.";
    } else {
        echo "Failed to delete review.";
    }
}
?>
