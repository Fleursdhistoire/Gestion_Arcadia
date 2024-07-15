<?php
include '../db.php';

$stmt = $conn->prepare("SELECT * FROM utilisateur");
$stmt->execute();
$result = $stmt->get_result();
$users = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($users);
?>
