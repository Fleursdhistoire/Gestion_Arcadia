<?php
include '../db.php';
include '../session.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'create') {
        $animal_id = $_POST['animal_id'];
        $description = $_POST['description'];
        $date = $_POST['date'];

        $stmt = $conn->prepare("INSERT INTO rapport_veterinaire (animal_id, description, date) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $animal_id, $description, $date);
        if ($stmt->execute()) {
            echo "Report created successfully.";
        } else {
            echo "Failed to create report.";
        }
    } elseif ($action === 'update') {
        $report_id = $_POST['report_id'];
        $animal_id = $_POST['animal_id'];
        $description = $_POST['description'];
        $date = $_POST['date'];

        $stmt = $conn->prepare("UPDATE rapport_veterinaire SET animal_id = ?, description = ?, date = ? WHERE report_id = ?");
        $stmt->bind_param("issi", $animal_id, $description, $date, $report_id);
        if ($stmt->execute()) {
            echo "Report updated successfully.";
        } else {
            echo "Failed to update report.";
        }
    } elseif ($action === 'delete') {
        $report_id = $_POST['report_id'];

        $stmt = $conn->prepare("DELETE FROM rapport_veterinaire WHERE report_id = ?");
        $stmt->bind_param("i", $report_id);
        if ($stmt->execute()) {
            echo "Report deleted successfully.";
        } else {
            echo "Failed to delete report.";
        }
    }
} else {
    // Fetch reports to display on the page
    $result = $conn->query("SELECT * FROM rapport_veterinaire");
    $reports = [];
    while ($row = $result->fetch_assoc()) {
        $reports[] = $row;
    }
    echo json_encode($reports);
}
?>
