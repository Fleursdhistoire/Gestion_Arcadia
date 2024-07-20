<?php
include '../db.php';
include '../session.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $rapport_id = $_GET['rapport_id'] ?? null;

    if (empty($rapport_id)) {
        echo "ID du rapport requis.";
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM rapport_veterinaire WHERE rapport_id = ?");
    $stmt->bind_param("i", $rapport_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $rapport = $result->fetch_assoc();
        echo json_encode($rapport);
    } else {
        echo "Aucun rapport trouvé.";
    }

    $stmt->close();
}
?>
