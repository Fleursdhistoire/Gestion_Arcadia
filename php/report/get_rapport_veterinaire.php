<?php
include '../db.php';

$stmt = $conn->prepare("SELECT * FROM rapport_veterinaire");
$stmt->execute();
$result = $stmt->get_result();
$reports = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($reports);
?>
