<?php
include '../db.php';
include '../session.php';

requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("UPDATE utilisateur SET username = ? WHERE id = ?");
    $stmt->bind_param("si", $username, $user_id);
    $stmt->execute();

    $role_stmt = $conn->prepare("UPDATE role SET label = ? WHERE user_id = ?");
    $role_stmt->bind_param("si", $role, $user_id);
    $role_stmt->execute();

    echo "User updated successfully.";
}
?>
