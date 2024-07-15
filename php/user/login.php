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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT utilisateur.password, role.label FROM utilisateur JOIN role ON utilisateur.role_id = role.role_id WHERE utilisateur.username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_password, $role);

    


    if ($stmt->num_rows > 0) {
        $stmt->fetch(); 
        console_log(password_hash($password, PASSWORD_DEFAULT));
        console_log($hashed_password);
        console_log(password_verify($password, $hashed_password));
        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            if ($role == 'Vétérinaire') {
                console_log($role);
                header("Location: ../vet/vet_dashboard.html");
            } elseif ($role == 'Employé') {
                console_log($role);
                header("Location: ../employee/employee_dashboard.html");
            } else {
                header("Location: ../admin/admin_dashboard.html");
            }
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email address.";
    }
}
?>
