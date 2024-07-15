<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO contact (titre, description, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $titre, $description, $email);
    if ($stmt->execute()) {
        echo "Message sent successfully.";
    } else {
        echo "Failed to send message.";
    }
}
?>
