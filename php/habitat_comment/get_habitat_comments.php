<?php
include '../db.php';

$stmt = $conn->prepare("SELECT * FROM habitat_comment");
$stmt->execute();
$result = $stmt->get_result();
$comments = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($comments);
?>
