<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment_id = $_POST['comment_id'];

    $stmt = $conn->prepare("DELETE FROM habitat_comment WHERE comment_id = ?");
    $stmt->bind_param("i", $comment_id);
    if ($stmt->execute()) {
        echo "Comment deleted successfully.";
    } else {
        echo "Failed to delete comment.";
    }
}
?>
