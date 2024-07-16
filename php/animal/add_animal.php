<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = $_POST['prenom'];
    $etat = $_POST['etat'];
    $nom_habitat = $_POST['nom_habitat'];
    $nom_race = $_POST['nom_race'];

    // Récupérer habitat_id en fonction du nom de l'habitat
    $habitat_id_stmt = $conn->prepare("SELECT habitat_id FROM habitat WHERE nom = ?");
    $habitat_id_stmt->bind_param("s", $nom_habitat);
    $habitat_id_stmt->execute();
    $habitat_id_stmt->bind_result($habitat_id);
    $habitat_id_stmt->fetch();
    $habitat_id_stmt->close();

    // Récupérer race_id en fonction du nom de la race
    $race_id_stmt = $conn->prepare("SELECT race_id FROM race WHERE label = ?");
    $race_id_stmt->bind_param("s", $nom_race);
    $race_id_stmt->execute();
    $race_id_stmt->bind_result($race_id);
    $race_id_stmt->fetch();
    $race_id_stmt->close();

    if ($habitat_id && $race_id) {
        // Insertion de l'animal
        $stmt = $conn->prepare("INSERT INTO animal (prenom, etat, habitat_id, race_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $prenom, $etat, $habitat_id, $race_id);
        if ($stmt->execute()) {
            echo "Animal ajouté avec succès.";
        } else {
            echo "Échec de l'ajout de l'animal.";
        }
        $stmt->close();
    } else {
        echo "Habitat ou Race introuvable.";
    }

    $conn->close();
}
?>
