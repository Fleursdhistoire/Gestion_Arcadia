<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $report_id = $_POST['report_id'];
    $date = $_POST['date'];
    $detail = $_POST['detail'];

    $stmt = $conn->prepare("UPDATE rapport_veterinaire SET date = ?, detail = ? WHERE rapport_veterinaire_id = ?");
    $stmt->bind_param("ssi", $date, $detail, $report_id);
    if ($stmt->execute()) {
        echo "Report updated successfully.";
    } else {
        echo "Failed to update report.";
    }
}
?>
