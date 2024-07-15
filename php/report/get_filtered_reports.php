<?php
include '../db.php';

$date = $_GET['date'];

$stmt = $conn->prepare("SELECT * FROM rapport_veterinaire WHERE date = ?");
$stmt->bind_param("s", $date);
$stmt->execute();
$result = $stmt->get_result();
$reports = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($reports);
?>
