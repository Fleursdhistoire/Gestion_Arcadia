<?php
include '../db.php';

$stmt = $conn->prepare("SELECT * FROM avis WHERE valide = TRUE");
$stmt->execute();
$result = $stmt->get_result();
$reviews = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($reviews);
?>
