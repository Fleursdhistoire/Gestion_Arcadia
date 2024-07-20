<?php
include '../db.php';
include '../session.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $animal_id = $_POST['animal_id'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    // Validation des entrées
    if (empty($animal_id) || empty($description) || empty($date)) {
        echo "Tous les champs sont obligatoires.";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO rapport_veterinaire (animal_id, description, date) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $animal_id, $description, $date);

    if ($stmt->execute()) {
        echo "Rapport ajouté avec succès.";
    } else {
        echo "Échec de l'ajout du rapport.";
    }

    $stmt->close();
}
?>
