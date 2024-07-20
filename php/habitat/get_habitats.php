<?php
include 'db.php';

$stmt = $conn->prepare("SELECT * FROM habitat");
$stmt->execute();
$result = $stmt->get_result();
$habitats = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($habitats);
?>
