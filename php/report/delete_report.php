<?php
include '../db.php';
include '../session.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rapport_id = $_POST['rapport_id'];

    // Validation de l'entrée
    if (empty($rapport_id)) {
        echo "ID du rapport requis.";
        exit;
    }

    $stmt = $conn->prepare("DELETE FROM rapport_veterinaire WHERE rapport_id = ?");
    $stmt->bind_param("i", $rapport_id);

    if ($stmt->execute()) {
        echo "Rapport supprimé avec succès.";
    } else {
        echo "Échec de la suppression du rapport.";
    }

    $stmt->close();
}
?>
