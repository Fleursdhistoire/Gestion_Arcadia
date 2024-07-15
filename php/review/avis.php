<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $avis_id = $_POST['avis_id'];
    $stmt = $conn->prepare("SELECT * FROM avis WHERE avis_id = ?");
    $stmt->bind_param("i", $avis_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $avis = $result->fetch_assoc();
    echo json_encode($avis);
}
?>
