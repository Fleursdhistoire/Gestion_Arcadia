<?php
include '../mongodb/mongodb_connection.php';

function getAnimalViews() {
    global $mongo_conn;

    $collection = $mongo_conn->zoo->animal_views;
    $views = $collection->find()->toArray();
    return json_encode($views);
}

echo getAnimalViews();
?>
