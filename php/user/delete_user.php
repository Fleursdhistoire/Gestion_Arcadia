<?php
include '../db.php';
include '../session.php';

requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];

    $stmt = $conn->prepare("DELETE FROM utilisateur WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    $role_stmt = $conn->prepare("DELETE FROM role WHERE user_id = ?");
    $role_stmt->bind_param("i", $user_id);
    $role_stmt->execute();

    echo "User deleted successfully.";
}
?>
