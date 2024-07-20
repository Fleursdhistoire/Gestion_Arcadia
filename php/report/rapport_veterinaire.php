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

    // Validation des entrées
    if (empty($animal_id) || empty($veterinaire_id) || empty($description) || empty($date_rapport)) {
        echo "Tous les champs sont requis.";
        exit;
    }

    if (empty($rapport_id)) {
        // Insert new report
        $stmt = $conn->prepare("INSERT INTO rapport_veterinaire (animal_id, veterinaire_id, description, date_rapport) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $animal_id, $veterinaire_id, $description, $date_rapport);
        $action = "ajouté";
    } else {
        // Update existing report
        $stmt = $conn->prepare("UPDATE rapport_veterinaire SET animal_id = ?, veterinaire_id = ?, description = ?, date_rapport = ? WHERE rapport_id = ?");
        $stmt->bind_param("iissi", $animal_id, $veterinaire_id, $description, $date_rapport, $rapport_id);
        $action = "mis à jour";
    }

    if ($stmt->execute()) {
        echo "Rapport vétérinaire $action avec succès.";
    } else {
        echo "Échec de l'$action du rapport vétérinaire.";
    }

    $stmt->close();
}
?>
