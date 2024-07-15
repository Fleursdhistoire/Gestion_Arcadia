<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $avis_id = $_POST['avis_id'];
    $visibilite = $_POST['visibilite'];

    $stmt = $conn->prepare("UPDATE avis SET valide = ? WHERE avis_id = ?");
    $stmt->bind_param("ii", $visibilite, $avis_id);
    if ($stmt->execute()) {
        echo "Review visibility updated successfully.";
    } else {
        echo "Failed to update review visibility.";
    }
}
?>
