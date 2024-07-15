<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $animal_id = $_POST['animal_id'];
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $nourriture = $_POST['nourriture'];
    $quantite = $_POST['quantite'];

    $stmt = $conn->prepare("INSERT INTO alimentation (animal_id, date, heure, nourriture, quantite) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $animal_id, $date, $heure, $nourriture, $quantite);
    if ($stmt->execute()) {
        echo "Food entry added successfully.";
    } else {
        echo "Failed to add food entry.";
    }
}
?>
