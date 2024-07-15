<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['pseudo'];
    $commentaire = $_POST['commentaire'];

    $stmt = $conn->prepare("INSERT INTO avis (pseudo, commentaire, isVisible) VALUES (?, ?, 1)");
    $stmt->bind_param("ss", $pseudo, $commentaire);
    if ($stmt->execute()) {
        echo "Review added successfully.";
    } else {
        echo "Failed to add review.";
    }
    $stmt->close();
    $conn->close();
} else {
    // Fetch all reviews
    $result = $conn->query("SELECT pseudo, commentaire FROM avis WHERE isVisible = 1");
    $reviews = [];
    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }
    echo json_encode($reviews);
    $conn->close();
}
?>
