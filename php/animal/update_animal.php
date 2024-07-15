<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $animal_id = $_POST['animal_id'];
    $prenom = $_POST['prenom'];
    $etat = $_POST['etat'];
    $habitat_id = $_POST['habitat_id'];
    $race_id = $_POST['race_id'];

    $stmt = $conn->prepare("UPDATE animal SET prenom = ?, etat = ?, habitat_id = ?, race_id = ? WHERE animal_id = ?");
    $stmt->bind_param("ssiii", $prenom, $etat, $habitat_id, $race_id, $animal_id);
    if ($stmt->execute()) {
        echo "Animal updated successfully.";
    } else {
        echo "Failed to update animal.";
    }
}
?>
