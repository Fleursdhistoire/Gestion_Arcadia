<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $animal_id = $_POST['animal_id'];
    incrementAnimalView($animal_id);
}

function incrementAnimalView($animal_id) {
    global $conn;

    $stmt = $conn->prepare("UPDATE animal SET views = views + 1 WHERE animal_id = ?");
    $stmt->bind_param("i", $animal_id);
    $stmt->execute();
}
?>
