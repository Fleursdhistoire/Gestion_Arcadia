<?php
include '../db.php';
include '../session.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rapport_id = $_POST['rapport_id'] ?? null;
    $animal_id = $_POST['animal_id'] ?? null;
    $veterinaire_id = $_POST['veterinaire_id'] ?? null;
    $description = $_POST['description'] ?? null;
    $date_rapport = $_POST['date_rapport'] ?? null;

    if (empty($rapport_id) || empty($animal_id) || empty($veterinaire_id) || empty($description) || empty($date_rapport)) {
        echo "Tous les champs sont requis.";
        exit;
    }

    $stmt = $conn->prepare("UPDATE rapport_veterinaire SET animal_id = ?, veterinaire_id = ?, description = ?, date_rapport = ? WHERE rapport_id = ?");
    $stmt->bind_param("iissi", $animal_id, $veterinaire_id, $description, $date_rapport, $rapport_id);

    if ($stmt->execute()) {
        echo "Rapport vétérinaire mis à jour avec succès.";
    } else {
        echo "Échec de la mise à jour du rapport vétérinaire.";
    }

    $stmt->close();
}
?>
