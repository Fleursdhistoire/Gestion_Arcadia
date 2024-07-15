<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['username']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: ../login.html');
        exit();
    }
}

function login($username) {
    $_SESSION['username'] = $username;
}

function logout() {
    session_destroy();
}
?>
