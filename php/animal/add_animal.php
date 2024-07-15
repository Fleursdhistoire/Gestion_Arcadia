<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = $_POST['prenom'];
    $etat = $_POST['etat'];
    $habitat_id = $_POST['habitat_id'];
    $race_id = $_POST['race_id'];

    $stmt = $conn->prepare("INSERT INTO animal (prenom, etat, habitat_id, race_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $prenom, $etat, $habitat_id, $race_id);
    if ($stmt->execute()) {
        echo "Animal added successfully.";
    } else {
        echo "Failed to add animal.";
    }
}
?>
