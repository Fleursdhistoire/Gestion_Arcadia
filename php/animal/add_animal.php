<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = $_POST['prenom'];
    $etat = $_POST['etat'];
    $animal_id = $_POST['animal_id'];
    $habitat_id = $_POST['habitat_id'];
    $race_id = $_POST['race_id'];


    //Récupérer le race_idet le hbaitat_id en fonction du rôle sélectionné



    $habitat_id_stmt = $conn->prepare("SELECT habitat_id FROM habitat WHERE habitat_id  = ?");
    $habitat_id_stmt->bind_param("i", $habitat_id);
    $habitat_id_stmt->execute();
    $habitat_id_stmt->bind_result($habitat_id);
    $habitat_id_stmt->fetch();
    $habitat_id_stmt->close();

    $race_id_stmt = $conn->prepare("SELECT race_id FROM race WHERE race_id  = ?");
    $race_id_stmt->bind_param("i", $race_id);
    $race_id_stmt->execute();
    $race_id_stmt->bind_result($race_id);
    $race_id_stmt->fetch();
    $race_id_stmt->close();

    $stmt = $conn->prepare("INSERT INTO animal (animal_id, prenom, etat, habitat_id, race_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issii", $animal_id, $prenom, $etat, $habitat_id ,$race_id);
    if ($stmt->execute()) {
        echo "Animal added successfully.";
    } else {
        echo "Failed to add animal.";
    }
}
