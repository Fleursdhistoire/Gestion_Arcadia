<?php
include '../mongodb/mongodb_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $animal_id = $_POST['animal_id'];
    incrementAnimalView($animal_id);
}

function incrementAnimalView($animal_id) {
    global $mongo_conn;

    $collection = $mongo_conn->zoo->animal_views;
    $collection->updateOne(
        ['animal_id' => $animal_id],
        ['$inc' => ['views' => 1]],
        ['upsert' => true]
    );
}
?>
