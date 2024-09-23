<?php
session_start();

// Check if the session 'id_user' is set
if (!isset($_SESSION['user'])) {
    // Redirect to the login page if 'id_user' does not exist
    header("Location: /login/");
    exit;
} else {
    $IdUser = $_SESSION['user']['id_user'];
    $user = $_SESSION['user'];
    /*echo "<pre>";
    print_r($_SESSION['user']);
    echo "</pre>";*/
}

?>
