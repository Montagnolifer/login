<?php
require_once 'connection.php'; // Include the connection file

// Function to sanitize input data
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Check if the form was submitted via POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $whatsapp = sanitizeInput($_POST['whatsapp']);
    $password = sanitizeInput($_POST['password']);
    $confirmPassword = sanitizeInput($_POST['confirm_password']);

    // Additional validation
    if (empty($name) || empty($email) || empty($whatsapp) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    if ($password !== $confirmPassword) {
        echo "Passwords do not match.";
        exit;
    }

    // Check if email or WhatsApp already exists
    try {
        $checkStmt = $conn->prepare("SELECT * FROM users WHERE email = :email OR whatsapp = :whatsapp");
        $checkStmt->bindParam(':email', $email);
        $checkStmt->bindParam(':whatsapp', $whatsapp);
        $checkStmt->execute();

        if ($checkStmt->rowCount() > 0) {
            echo "Email or WhatsApp already registered.";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }

    // Hash the password
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Get the current date and time
    $currentDate = date('Y-m-d H:i:s');

    try {
        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO users (name, email, whatsapp, password, date) VALUES (:name, :email, :whatsapp, :password, :date)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':whatsapp', $whatsapp);
        $stmt->bindParam(':password', $passwordHash);
        $stmt->bindParam(':date', $currentDate);

        if ($stmt->execute()) {
            echo "success"; // Return success message
        } else {
            echo "Error registering.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>