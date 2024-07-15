<?php
include '../db.php';

$stmt = $conn->prepare("SELECT * FROM animal");
$stmt->execute();
$result = $stmt->get_result();
$animals = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($animals);
?>
