<?php
include '../db.php';
include '../session.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $animal_id = $_GET['animal_id'] ?? null;
    $veterinaire_id = $_GET['veterinaire_id'] ?? null;

    $query = "SELECT * FROM rapport_veterinaire WHERE 1=1";
    $params = [];
    $types = "";

    if (!empty($animal_id)) {
        $query .= " AND animal_id = ?";
        $params[] = $animal_id;
        $types .= "i";
    }

    if (!empty($veterinaire_id)) {
        $query .= " AND veterinaire_id = ?";
        $params[] = $veterinaire_id;
        $types .= "i";
    }

    $stmt = $conn->prepare($query);
    if ($types) {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $result = $stmt->get_result();

    $rapports = [];
    while ($row = $result->fetch_assoc()) {
        $rapports[] = $row;
    }

    echo json_encode($rapports);

    $stmt->close();
}
?>
