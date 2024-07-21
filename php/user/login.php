<?php
session_start();
include '../db.php';

// Fonction pour envoyer des messages de débogage à la console du navigateur
function console_log($message) {
    if (is_array($message) || is_object($message)) {
        echo("<script>console.log('PHP: " . json_encode($message) . "');</script>");
    } else {
        echo("<script>console.log('PHP: " . $message . "');</script>");
    }
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    console_log("Email: $email");
    console_log("Password: $password");

    $stmt = $conn->prepare("SELECT utilisateur.password, role.label FROM utilisateur JOIN role ON utilisateur.role_id = role.role_id WHERE utilisateur.username = ?");
    if (!$stmt) {
        console_log("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    if (!$stmt->execute()) {
        console_log("Execute failed: " . $stmt->error);
    }

    $stmt->store_result();
    $stmt->bind_result($hashed_password, $role);

    console_log("Number of rows: " . $stmt->num_rows);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        console_log("Hashed password from DB: $hashed_password");
        console_log("Password verify: " . password_verify($password, $hashed_password));

        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $email;
            $_SESSION['role'] = $role;
            console_log("Role: $role");

            if ($role == 'Vétérinaire') {
                header("Location: ../vet/vet_dashboard.html");
            } elseif ($role == 'Employé') {
                header("Location: ../employee/employee_dashboard.html");
            } elseif ($role == 'Admin') {
                header("Location: ../../admin/admin_dashboard.html");
            }
            exit();
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Utilisateur non trouvé.";
    }
}
?>