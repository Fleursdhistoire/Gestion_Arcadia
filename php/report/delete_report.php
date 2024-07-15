<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $report_id = $_POST['report_id'];

    $stmt = $conn->prepare("DELETE FROM rapport_veterinaire WHERE rapport_veterinaire_id = ?");
    $stmt->bind_param("i", $report_id);
    if ($stmt->execute()) {
        echo "Report deleted successfully.";
    } else {
        echo "Failed to delete report.";
    }
}
?>
