<?php
include '../db.php';
include '../session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

// Récupérer le role_id en fonction du rôle sélectionné
    $role_stmt = $conn->prepare("SELECT role_id FROM role WHERE label = ?");
    $role_stmt->bind_param("s", $role);
    $role_stmt->execute();
    $role_stmt->bind_result($role_id);
    $role_stmt->fetch();
    $role_stmt->close();
    
    $stmt = $conn->prepare("INSERT INTO utilisateur (username, password, prenom, nom, role_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $username, $password, $prenom, $nom, $role_id);
    if ($stmt->execute()) {
        
        // Send email (username only)
        mail($username, "Your account at Zoo Arcadia", "Your account has been created. Username: $username");
        echo "User created successfully.";
    } else {
        echo "Failed to create user.";
    }
}